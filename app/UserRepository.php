<?php

require_once __DIR__ . '/Database.php';

class UserRepository
{
  private PDO $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  public static function default(): self
  {
    return new self(Database::connection());
  }

  public function findByEmail(string $email): ?array
  {
    $statement = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    return $user ?: null;
  }

  public function create(string $name, string $phone, string $email, string $password): array
  {
    $statement = $this->db->prepare(
      'INSERT INTO users (meno, telefon, email, password_hash, created_at)
       VALUES (:meno, :telefon, :email, :password_hash, :created_at)'
    );

    $statement->execute([
      'meno' => $name,
      'telefon' => $phone,
      'email' => $email,
      'password_hash' => password_hash($password, PASSWORD_DEFAULT),
      'created_at' => date('Y-m-d H:i:s'),
    ]);

    return $this->findByEmail($email);
  }
}
