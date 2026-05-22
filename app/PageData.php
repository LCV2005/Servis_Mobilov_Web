<?php

class PageData
{
  private string $basePath;
  private ?array $serviceOrderData;

  public function __construct(string $basePath, ?array $serviceOrderData)
  {
    $this->basePath = $basePath;
    $this->serviceOrderData = $serviceOrderData;
  }

  public function basePath(): string
  {
    return $this->basePath;
  }

  public function serviceOrderData(): ?array
  {
    return $this->serviceOrderData;
  }
}
