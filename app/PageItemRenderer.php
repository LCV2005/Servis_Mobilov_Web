<?php

require_once __DIR__ . '/View.php';

class PageItemRenderer
{
  public static function renderGrid(array $items, string $basePath): void
  {
    foreach ($items as $item) {
      self::renderItem($item, $basePath);
    }
  }

  private static function renderItem(array $item, string $basePath): void
  {
    $columnClass = $item['column_class'] ?: 'col-lg-6';
    $cardClass = trim('service-item ' . ($item['css_class'] ?? ''));
    ?>
      <div class="<?php echo View::e($columnClass); ?>">
        <div class="<?php echo View::e($cardClass); ?>" style="margin-bottom: 24px;">
          <h4><?php echo View::e($item['title']); ?></h4>
          <p><?php echo View::e($item['description']); ?></p>
          <?php self::renderDetail($item['detail1_label'] ?? '', $item['detail1_value'] ?? ''); ?>
          <?php self::renderDetail($item['detail2_label'] ?? '', $item['detail2_value'] ?? ''); ?>
          <?php self::renderDetail($item['detail3_label'] ?? '', $item['detail3_value'] ?? ''); ?>
          <?php if (!empty($item['button_text'])): ?>
            <div class="gradient-button" style="margin-top: 12px;">
              <a href="<?php echo View::e(self::href($item['button_href'] ?? '', $basePath)); ?>"><?php echo View::e($item['button_text']); ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php
  }

  private static function renderDetail(string $label, string $value): void
  {
    if ($label === '' && $value === '') {
      return;
    }
    ?>
      <p><strong><?php echo View::e($label); ?>:</strong> <?php echo View::e($value); ?></p>
    <?php
  }

  private static function href(string $href, string $basePath): string
  {
    if ($href === '' || str_starts_with($href, 'http') || str_starts_with($href, '#')) {
      return $href;
    }

    return $basePath . ltrim($href, '/');
  }
}
