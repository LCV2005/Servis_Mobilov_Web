<?php

require_once __DIR__ . '/ServiceOrderRepository.php';

class FormHandler
{
  private ?array $serviceOrderData = null;
  private ?string $newsletterEmail = null;
  private ?array $popupLoginData = null;
  private ?array $popupRegisterData = null;
  private ServiceOrderRepository $serviceOrderRepository;

  public function __construct(array $server, array $post)
  {
    $this->serviceOrderRepository = ServiceOrderRepository::default();

    if (($server['REQUEST_METHOD'] ?? '') !== 'POST') {
      return;
    }

    if (isset($post['service_order_submit'])) {
      $name = $this->clean($post['meno'] ?? '');
      $contact = $this->clean($post['kontakt'] ?? '');
      $device = $this->clean($post['zariadenie'] ?? '');
      $description = $this->clean($post['popis'] ?? '');
      $serviceType = $this->clean($post['service_type'] ?? '');

      if ($name !== '' && $contact !== '' && $device !== '' && $description !== '' && $serviceType !== '') {
        $this->serviceOrderData = $this->serviceOrderRepository->create(
          $name,
          $contact,
          $device,
          $description,
          $serviceType
        );
      }
    }

    if (isset($post['newsletter_submit'])) {
      $this->newsletterEmail = $this->clean($post['email'] ?? '');
    }

    if (isset($post['popup_login_submit'])) {
      $this->popupLoginData = [
        'kontakt' => $this->clean($post['login_contact'] ?? ''),
        'kod' => $this->clean($post['login_code'] ?? ''),
        'remember' => isset($post['remember']) ? 'ano' : 'nie',
      ];
    }

    if (isset($post['popup_register_submit'])) {
      $this->popupRegisterData = [
        'meno' => $this->clean($post['register_name'] ?? ''),
        'kontakt' => $this->clean($post['register_contact'] ?? ''),
        'zariadenie' => $this->clean($post['register_device'] ?? ''),
        'updates' => isset($post['send_updates']) ? 'ano' : 'nie',
      ];
    }

  }

  public function serviceOrderData(): ?array
  {
    return $this->serviceOrderData;
  }

  public function newsletterEmail(): ?string
  {
    return $this->newsletterEmail;
  }

  public function popupLoginData(): ?array
  {
    return $this->popupLoginData;
  }

  public function popupRegisterData(): ?array
  {
    return $this->popupRegisterData;
  }

  public static function serviceTypeLabel(string $type): string
  {
    $labels = [
      'express' => 'Express servis',
      'standard' => 'Standard servis',
      'diagnostika' => 'Diagnostika bez zavazku',
    ];

    return $labels[$type] ?? $type;
  }

  private function clean(string $value): string
  {
    return trim($value);
  }
}
