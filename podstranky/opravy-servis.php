<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'opravy-servis',
  'subpage-content',
  'Opravy a',
  'servis zariadení',
  'Rýchly servis mobilov, tabletov a smart zariadení.'
))->render();
