<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'opravy-servis',
  'subpage-content',
  'Opravy a',
  'servis zariadeni',
  'Rychly servis mobilov, tabletov a smart zariadeni.'
))->render();
