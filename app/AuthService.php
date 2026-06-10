<?php

require_once __DIR__ . '/UserRepository.php';

class AuthService
{
  private const ADMIN_EMAIL_HASH = 'a2d5eaf2a66150a925ffbc6d68b4498c3d2a4f8134955939feff1f4eec4eb215';
  private const ADMIN_PASSWORD_HASH = '$2y$10$Z6lNapzQnMrcciqqAaB8ueN9m5oMLagUkJXN5vMmt5PChXNsZp9FK';

  private ?UserRepository $users;

  public function __construct(?UserRepository $users = null)
  {
    $this->users = $users;
    $this->startSession();
  }

  public static function default(): self
  {
    return new self();
  }

  public function register(string $name, string $phone, string $email, string $password): array
  {
    if ($this->users()->findByEmail($email) !== null) {
      throw new RuntimeException('Používateľ s týmto e-mailom už existuje.');
    }

    $user = $this->users()->create($name, $phone, $email, $password);

    return $user;
  }

  public function login(string $email, string $password): bool
  {
    if (
      hash_equals(self::ADMIN_EMAIL_HASH, $this->emailHash($email))
      && password_verify($password, self::ADMIN_PASSWORD_HASH)
    ) {
      $this->loginUser([
        'id' => 0,
        'meno' => 'Admin',
        'email' => 'admin',
        'role' => 'admin',
      ]);

      return true;
    }

    $user = $this->users()->findByEmail($email);

    if ($user === null || !password_verify($password, $user['password_hash'] ?? '')) {
      return false;
    }

    $this->loginUser($user);

    return true;
  }

  public function logout(): void
  {
    unset($_SESSION['user']);
  }

  public function user(): ?array
  {
    return $_SESSION['user'] ?? null;
  }

  public function isLoggedIn(): bool
  {
    return $this->user() !== null;
  }

  public function isAdmin(): bool
  {
    return ($this->user()['role'] ?? '') === 'admin';
  }

  private function loginUser(array $user): void
  {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'meno' => $user['meno'],
      'email' => $user['email'],
      'role' => $user['role'] ?? 'user',
    ];
  }

  private function emailHash(string $email): string
  {
    return hash('sha256', strtolower(trim($email)));
  }

  private function users(): UserRepository
  {
    if ($this->users === null) {
      try {
        $this->users = UserRepository::default();
      } catch (Throwable $exception) {
        throw new RuntimeException('DatabĂˇza momentĂˇlne nie je dostupnĂˇ.');
      }
    }

    return $this->users;
  }

  private function startSession(): void
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }
}
