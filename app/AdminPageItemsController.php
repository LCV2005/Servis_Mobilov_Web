<?php

require_once __DIR__ . '/AuthService.php';
require_once __DIR__ . '/PageItemRepository.php';

class AdminPageItemsController
{
  private AuthService $auth;
  private PageItemRepository $items;
  private string $selectedPage;
  private string $message = '';
  private string $error = '';
  private ?array $editingItem = null;

  public function __construct(AuthService $auth, PageItemRepository $items, array $server, array $get, array $post)
  {
    $this->auth = $auth;
    $this->items = $items;

    if (($get['action'] ?? '') === 'logout') {
      $this->auth->logout();
      header('Location: ../index.php');
      exit;
    }

    $this->selectedPage = $this->resolveSelectedPage($post['page'] ?? $get['page'] ?? 'opravy-servis');

    if (($server['REQUEST_METHOD'] ?? 'GET') === 'POST') {
      $this->handlePost($post);
    }

    if ($this->auth->isAdmin() && isset($get['edit'])) {
      $this->editingItem = $this->items->find((int) $get['edit']);
      if ($this->editingItem !== null) {
        $this->selectedPage = $this->editingItem['page'];
      }
    }
  }

  public function auth(): AuthService
  {
    return $this->auth;
  }

  public function items(): PageItemRepository
  {
    return $this->items;
  }

  public function selectedPage(): string
  {
    return $this->selectedPage;
  }

  public function message(): string
  {
    return $this->message;
  }

  public function error(): string
  {
    return $this->error;
  }

  public function editingItem(): ?array
  {
    return $this->editingItem;
  }

  public function selectedPageItems(): array
  {
    return $this->items->byPage($this->selectedPage);
  }

  private function handlePost(array $post): void
  {
    try {
      if (isset($post['account_register_submit'])) {
        $this->auth->register(
          trim($post['account_register_name'] ?? ''),
          trim($post['account_register_phone'] ?? ''),
          trim($post['account_register_email'] ?? ''),
          $post['account_register_password'] ?? ''
        );
        header('Location: ../index.php');
        exit;
      }

      if (isset($post['account_login_submit'])) {
        $this->handleLogin($post);
      }

      if ($this->auth->isAdmin() && isset($post['item_create_submit'])) {
        $this->items->create($post);
        $this->message = 'Položka bola pridaná.';
      }

      if ($this->auth->isAdmin() && isset($post['item_update_submit'])) {
        $this->items->update((int) ($post['id'] ?? 0), $post);
        $this->message = 'Položka bola upravená.';
      }

      if ($this->auth->isAdmin() && isset($post['item_delete_submit'])) {
        $this->items->delete((int) ($post['id'] ?? 0));
        $this->message = 'Položka bola vymazaná.';
      }

      if (!$this->auth->isAdmin() && $this->containsCrudSubmit($post)) {
        $this->error = 'CRUD operácie môže vykonávať iba admin.';
      }
    } catch (RuntimeException $exception) {
      $this->error = $exception->getMessage();
    }
  }

  private function handleLogin(array $post): void
  {
    $loggedIn = $this->auth->login(
      trim($post['account_login_email'] ?? ''),
      $post['account_login_password'] ?? ''
    );

    if ($loggedIn) {
      if (!$this->auth->isAdmin()) {
        header('Location: ../index.php');
        exit;
      }

      $this->message = 'Admin prihlásenie prebehlo úspešne.';
      return;
    }

    $this->error = 'Nesprávny e-mail alebo heslo.';
  }

  private function containsCrudSubmit(array $post): bool
  {
    return isset($post['item_create_submit']) || isset($post['item_update_submit']) || isset($post['item_delete_submit']);
  }

  private function resolveSelectedPage(string $page): string
  {
    return array_key_exists($page, $this->items->pages()) ? $page : 'opravy-servis';
  }
}
