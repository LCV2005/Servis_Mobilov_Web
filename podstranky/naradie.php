<?php
require_once __DIR__ . '/../app/DynamicContentPage.php';

(new DynamicContentPage(
  'naradie',
  'subpage-content',
  'Výmenné diely,',
  'náradie',
  'Jednoduchá ponuka dielov, náradia a doplnkov na prácu s telefónmi.'
))->render();
