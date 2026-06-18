<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'nahradne-diely',
  'subpage-content nahradne-diely-page',
  'Náhradné',
  'diely na predaj',
  'Predaj náhradných dielov pre telefóny a tablety. Vyberiete diel, overíme kompatibilitu a tovar pripravíme na odber alebo odoslanie.'
))->render();
