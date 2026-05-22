<?php

require_once __DIR__ . '/Database.php';

class ServiceOrderRepository
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

  public function create(string $name, string $contact, string $device, string $description, string $serviceType): array
  {
    $statement = $this->db->prepare(
      'INSERT INTO service_orders (meno, kontakt, zariadenie, popis, service_type, created_at)
       VALUES (:meno, :kontakt, :zariadenie, :popis, :service_type, :created_at)'
    );

    $statement->execute([
      'meno' => $name,
      'kontakt' => $contact,
      'zariadenie' => $device,
      'popis' => $description,
      'service_type' => $serviceType,
      'created_at' => date('Y-m-d H:i:s'),
    ]);

    return $this->findById((int) $this->db->lastInsertId()) ?? [
      'id' => (int) $this->db->lastInsertId(),
      'meno' => $name,
      'kontakt' => $contact,
      'zariadenie' => $device,
      'popis' => $description,
      'service_type' => $serviceType,
      'created_at' => date('Y-m-d H:i:s'),
    ];
  }

  public function findById(int $id): ?array
  {
    $statement = $this->db->prepare('SELECT * FROM service_orders WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $id]);
    $order = $statement->fetch();

    return $order ?: null;
  }
}