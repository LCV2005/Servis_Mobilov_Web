<?php

class Database
{
  private const HOST = '127.0.0.1';
  private const DATABASE = 'servis_mobilov_web';
  private const USER = 'root';
  private const PASSWORD = '';

  private static ?PDO $connection = null;

  public static function connection(): PDO
  {
    if (self::$connection === null) {
      self::createDatabaseIfMissing();

      self::$connection = new PDO(
        'mysql:host=' . self::HOST . ';dbname=' . self::DATABASE . ';charset=utf8mb4',
        self::USER,
        self::PASSWORD,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
      );

      self::createTablesIfMissing(self::$connection);
    }

    return self::$connection;
  }

  private static function createDatabaseIfMissing(): void
  {
    $pdo = new PDO(
      'mysql:host=' . self::HOST . ';charset=utf8mb4',
      self::USER,
      self::PASSWORD,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $pdo->exec('CREATE DATABASE IF NOT EXISTS `' . self::DATABASE . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
  }

  private static function createTablesIfMissing(PDO $pdo): void
  {
    $pdo->exec(
      'CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        meno VARCHAR(120) NOT NULL,
        telefon VARCHAR(60) NOT NULL,
        email VARCHAR(190) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    $pdo->exec(
      'CREATE TABLE IF NOT EXISTS page_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        page VARCHAR(80) NOT NULL,
        column_class VARCHAR(80) NOT NULL,
        css_class VARCHAR(120) NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        detail1_label VARCHAR(120) NOT NULL,
        detail1_value VARCHAR(255) NOT NULL,
        detail2_label VARCHAR(120) NOT NULL,
        detail2_value VARCHAR(255) NOT NULL,
        detail3_label VARCHAR(120) NOT NULL,
        detail3_value VARCHAR(255) NOT NULL,
        button_text VARCHAR(255) NOT NULL,
        button_href VARCHAR(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    $pdo->exec(
      'CREATE TABLE IF NOT EXISTS service_orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        meno VARCHAR(120) NOT NULL,
        kontakt VARCHAR(190) NOT NULL,
        zariadenie VARCHAR(190) NOT NULL,
        popis TEXT NOT NULL,
        service_type VARCHAR(40) NOT NULL,
        created_at DATETIME NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );
  }
}
