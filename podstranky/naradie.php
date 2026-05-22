<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'naradie',
  'subpage-content',
  'Vymenne diely,',
  'naradie',
  'Jednoducha ponuka dielov, naradia a doplnkov pre prace s telefonmi.'
))->render();
