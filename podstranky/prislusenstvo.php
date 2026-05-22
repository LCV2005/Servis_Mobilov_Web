<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'prislusenstvo',
  'subpage-content prislusenstvo-page',
  'Prislusenstvo,',
  'doplnky',
  'Predavame prislusenstvo pre telefony a tablety s overenou kompatibilitou.'
))->render();
