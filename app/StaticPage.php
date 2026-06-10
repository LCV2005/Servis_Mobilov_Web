<?php

require_once __DIR__ . '/PageData.php';

class StaticPage
{
  private string $basePath;
  private bool $subpage;

  public function __construct(string $basePath = '', bool $subpage = false)
  {
    $this->basePath = $basePath;
    $this->subpage = $subpage;
  }

  public function render(callable $content): void
  {
    $basePath = $this->basePath;
    $isSubpage = $this->subpage;
    $serviceOrderData = null;
    $newsletterEmail = null;

    include __DIR__ . '/../header.php';

    $callback = new ReflectionFunction($content);

    if ($callback->getNumberOfParameters() === 0) {
      $content();
    } else {
      $pageData = new PageData($basePath, $serviceOrderData);
      $content($pageData);
    }

    include __DIR__ . '/../footer.php';
  }
}
