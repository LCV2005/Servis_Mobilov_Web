<?php

class PageContext
{
  private string $basePath;
  private bool $subpage;
  private string $currentPage;

  public function __construct(string $basePath = '', bool $subpage = false, ?string $currentPage = null)
  {
    $this->basePath = $basePath;
    $this->subpage = $subpage;
    $this->currentPage = $currentPage ?? basename($_SERVER['PHP_SELF'] ?? 'index.php');
  }

  public function basePath(): string
  {
    return $this->basePath;
  }

  public function isSubpage(): bool
  {
    return $this->subpage;
  }

  public function currentPage(): string
  {
    return $this->currentPage;
  }

  public function bodyClass(): string
  {
    return $this->subpage ? 'subpage-page' : '';
  }

  public function isActive(string $page): bool
  {
    return $this->currentPage === $page;
  }

  public function activeClass(string $page): string
  {
    return $this->isActive($page) ? 'active' : '';
  }

  public function activeStyle(string $page): string
  {
    return $this->isActive($page) ? 'color:#4b8ef1!important;' : '';
  }
}
