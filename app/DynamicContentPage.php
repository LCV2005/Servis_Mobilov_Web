<?php

require_once __DIR__ . '/StaticPage.php';
require_once __DIR__ . '/PageItemRepository.php';
require_once __DIR__ . '/PageItemRenderer.php';
require_once __DIR__ . '/View.php';

class DynamicContentPage
{
  private string $pageKey;
  private string $wrapperClass;
  private string $title;
  private string $emphasis;
  private string $description;
  private PageItemRepository $items;

  public function __construct(
    string $pageKey,
    string $wrapperClass,
    string $title,
    string $emphasis,
    string $description,
    ?PageItemRepository $items = null
  ) {
    $this->pageKey = $pageKey;
    $this->wrapperClass = $wrapperClass;
    $this->title = $title;
    $this->emphasis = $emphasis;
    $this->description = $description;
    $this->items = $items ?? PageItemRepository::default();
  }

  public function render(): void
  {
    (new StaticPage('../', true))->render(function (PageData $page): void {
      $basePath = $page->basePath();
      ?>

      <div class="<?php echo View::e($this->wrapperClass); ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="section-heading text-center">
                <h4><?php echo View::e($this->title); ?> <em><?php echo View::e($this->emphasis); ?></em></h4>
                <img src="<?php echo View::e($basePath); ?>assets/images/heading-line-dec.png" alt="">
                <p><?php echo View::e($this->description); ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <?php PageItemRenderer::renderGrid($this->items->byPage($this->pageKey), $basePath); ?>
          </div>
        </div>
      </div>

      <?php
    });
  }
}
