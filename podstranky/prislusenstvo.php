<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'prislusenstvo',
  'subpage-content prislusenstvo-page',
  'Príslušenstvo,',
  'doplnky',
  'Predávame príslušenstvo pre telefóny a tablety s overenou kompatibilitou.'
))->render();
