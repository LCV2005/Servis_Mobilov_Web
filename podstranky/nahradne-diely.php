<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'nahradne-diely',
  'subpage-content nahradne-diely-page',
  'Nahradne',
  'diely na predaj',
  'Predaj nahradnych dielov pre telefony a tablety. Vyberiete diel, overime kompatibilitu a tovar pripravime na odber alebo odoslanie.'
))->render();
