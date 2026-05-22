<?php

require_once __DIR__ . '/UserRepository.php';

class AuthService
{
  private const ADMIN_EMAIL = 'ADMIN0@gmail.com';
  private const ADMIN_PASSWORD = '123456';

  private UserRepository $users;

  public function __construct(UserRepository $users)
  {
    $this->users = $users;
    $this->startSession();
  }

  public static function default(): self
  {
    return new self(UserRepository::default());
  }

  public function register(string $name, string $phone, string $email, string $password): array
  {
    if ($this->users->findByEmail($email) !== null) {
      throw new RuntimeException('Používateľ s týmto e-mailom už existuje.');
    }

    $user = $this->users->create($name, $phone, $email, $password);

    return $user;
  }

  public function login(string $email, string $password): bool
  {
    if ($email === self::ADMIN_EMAIL && $password === self::ADMIN_PASSWORD) {
      $this->loginUser([
        'id' => 0,
        'meno' => 'Admin',
        'email' => self::ADMIN_EMAIL,
        'role' => 'admin',
      ]);

      return true;
    }

    $user = $this->users->findByEmail($email);

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

  private function startSession(): void
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }
}
