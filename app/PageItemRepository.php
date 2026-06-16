<?php

require_once __DIR__ . '/Database.php';

class PageItemRepository
{
  private ?PDO $db;

  public function __construct(?PDO $db)
  {
    $this->db = $db;

    if ($this->db !== null && empty($this->all())) {
      $this->seedDefaults();
    }
  }

  public static function default(): self
  {
    try {
      return new self(Database::connection());
    } catch (Throwable $exception) {
      return new self(null);
    }
  }

  public function pages(): array
  {
    return [
      'opravy-servis' => 'Opravy a servis',
      'nahradne-diely' => 'Náhradné diely',
      'naradie' => 'Náradie',
      'prislusenstvo' => 'Príslušenstvo',
    ];
  }

  public function all(): array
  {
    if ($this->db === null) {
      return $this->defaults();
    }

    return $this->db()->query('SELECT * FROM page_items ORDER BY id ASC')->fetchAll();
  }

  public function byPage(string $page): array
  {
    if ($this->db === null) {
      return array_values(array_filter($this->defaults(), fn (array $item): bool => $item['page'] === $page));
    }

    $statement = $this->db()->prepare('SELECT * FROM page_items WHERE page = :page ORDER BY id ASC');
    $statement->execute(['page' => $page]);

    return $statement->fetchAll();
  }

  public function find(int $id): ?array
  {
    if ($this->db === null) {
      foreach ($this->defaults() as $item) {
        if ((int) $item['id'] === $id) {
          return $item;
        }
      }

      return null;
    }

    $statement = $this->db()->prepare('SELECT * FROM page_items WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $id]);
    $item = $statement->fetch();

    return $item ?: null;
  }

  public function create(array $data): void
  {
    $this->requireDatabase();

    $item = $this->fromPost($data);
    $this->insert($item, false);
  }

  public function update(int $id, array $data): void
  {
    $this->requireDatabase();

    $item = $this->fromPost($data);
    $item['id'] = $id;

    $statement = $this->db()->prepare(
      'UPDATE page_items SET
        page = :page,
        column_class = :column_class,
        css_class = :css_class,
        title = :title,
        description = :description,
        detail1_label = :detail1_label,
        detail1_value = :detail1_value,
        detail2_label = :detail2_label,
        detail2_value = :detail2_value,
        detail3_label = :detail3_label,
        detail3_value = :detail3_value,
        button_text = :button_text,
        button_href = :button_href
      WHERE id = :id'
    );

    $statement->execute($item);
  }

  public function delete(int $id): void
  {
    $this->requireDatabase();

    $statement = $this->db()->prepare('DELETE FROM page_items WHERE id = :id');
    $statement->execute(['id' => $id]);
  }

  private function fromPost(array $data, ?int $id = null): array
  {
    $item = [
      'page' => trim($data['page'] ?? 'opravy-servis'),
      'column_class' => trim($data['column_class'] ?? 'col-lg-6'),
      'css_class' => trim($data['css_class'] ?? ''),
      'title' => trim($data['title'] ?? ''),
      'description' => trim($data['description'] ?? ''),
      'detail1_label' => trim($data['detail1_label'] ?? ''),
      'detail1_value' => trim($data['detail1_value'] ?? ''),
      'detail2_label' => trim($data['detail2_label'] ?? ''),
      'detail2_value' => trim($data['detail2_value'] ?? ''),
      'detail3_label' => trim($data['detail3_label'] ?? ''),
      'detail3_value' => trim($data['detail3_value'] ?? ''),
      'button_text' => trim($data['button_text'] ?? ''),
      'button_href' => trim($data['button_href'] ?? ''),
    ];

    if ($id !== null) {
      $item['id'] = $id;
    }

    return $item;
  }

  private function insert(array $item, bool $withId): void
  {
    $columns = [
      'page',
      'column_class',
      'css_class',
      'title',
      'description',
      'detail1_label',
      'detail1_value',
      'detail2_label',
      'detail2_value',
      'detail3_label',
      'detail3_value',
      'button_text',
      'button_href',
    ];

    if ($withId) {
      array_unshift($columns, 'id');
    }

    $statement = $this->db()->prepare(
      'INSERT INTO page_items (' . implode(', ', $columns) . ')
       VALUES (:' . implode(', :', $columns) . ')'
    );

    $statement->execute(array_intersect_key($item, array_flip($columns)));
  }

  private function db(): PDO
  {
    if ($this->db === null) {
      throw new RuntimeException('Databaza momentalne nie je dostupna.');
    }

    return $this->db;
  }

  private function requireDatabase(): void
  {
    $this->db();
  }

  private function seedDefaults(): void
  {
    foreach ($this->defaults() as $item) {
      $this->insert($item, true);
    }
  }

  private function defaults(): array
  {
    return [
      ['id' => 1, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Výmena displeja a skla', 'description' => 'Vymeníme displej a otestujeme dotyk aj obraz.', 'detail1_label' => 'Orientačná cena', 'detail1_value' => 'od 39 EUR', 'detail2_label' => 'Čas opravy', 'detail2_value' => '60 - 180 minút', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať výmenu displeja', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 2, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Výmena batérie', 'description' => 'Skontrolujeme stav batérie a vymeníme ju za novú.', 'detail1_label' => 'Orientačná cena', 'detail1_value' => 'od 29 EUR', 'detail2_label' => 'Čas opravy', 'detail2_value' => '30 - 90 minút', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať výmenu batérie', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 3, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Oprava nabíjania', 'description' => 'Riešime problémy s nabíjaním a konektorom.', 'detail1_label' => 'Orientačná cena', 'detail1_value' => 'od 35 EUR', 'detail2_label' => 'Čas opravy', 'detail2_value' => '1 - 2 pracovné dni', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Nahlásiť poruchu nabíjania', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 4, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Diagnostika poruchy', 'description' => 'Zistíme príčinu poruchy a navrhneme opravu.', 'detail1_label' => 'Orientačná cena', 'detail1_value' => 'od 15 EUR (odčítava sa pri realizácii opravy)', 'detail2_label' => 'Čas diagnostiky', 'detail2_value' => 'do 24 hodín', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať diagnostiku', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 5, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Softvérové služby', 'description' => 'Pomôžeme s obnovou systému, prenosom dát a nastavením telefónu.', 'detail1_label' => 'Orientačná cena', 'detail1_value' => 'od 19 EUR', 'detail2_label' => 'Čas realizácie', 'detail2_value' => 'podľa rozsahu úlohy', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vyžiadať softvérový servis', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 6, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Pozáručný servis pre firmy', 'description' => 'Pre firmy ponúkame pravidelný servis a rýchlejšie vybavenie opráv.', 'detail1_label' => 'Bonus', 'detail1_value' => 'vyzdvihnutie zariadení podľa dohody', 'detail2_label' => '', 'detail2_value' => '', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Získať firemnú ponuku', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 7, 'page' => 'opravy-servis', 'column_class' => 'col-lg-12', 'css_class' => '', 'title' => 'Priebeh servisu krok za krokom', 'description' => '1) Prijatie. 2) Diagnostika. 3) Schválenie ceny. 4) Oprava. 5) Odovzdanie.', 'detail1_label' => 'Platba', 'detail1_value' => 'hotovosť, karta, prevod na faktúru.', 'detail2_label' => '', 'detail2_value' => '', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Spustiť objednávku servisu', 'button_href' => 'podstranky/objednat-servis.php'],

      ['id' => 8, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'display-bg-card', 'title' => 'Displeje a predné sklá', 'description' => 'LCD, OLED a predné sklá pre najbežnejšie modely telefónov.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 24 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'skladom / na objednávku do 48 hodín', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Overiť kompatibilitu a objednať', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 9, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'baterie-bg-card', 'title' => 'Batérie a napájacie moduly', 'description' => 'Náhradné batérie, nabíjacie porty a súvisiace moduly.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 11 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'najpredávanejšie modely ihneď', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať diel pre svoj model', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 10, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'kamery-bg-card', 'title' => 'Kamery, reproduktory a mikrofóny', 'description' => 'Predná a zadná kamera, reproduktory a mikrofóny.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 9 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'podľa modelu zariadenia', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Zistiť dostupnosť dielu', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 11, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'kryty-bg-card', 'title' => 'Zadný kryt, tlačidlá a drobné súčiastky', 'description' => 'Zadné kryty, tlačidlá, SIM tray a malé diely pre dokončené opravy.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 4 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'rýchle doskladnenie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Rezervovať súčiastky', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],

      ['id' => 12, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'vymenne-displeje-bg-card', 'title' => 'Výmenné displeje a dotykové sklá', 'description' => 'Displeje a dotykové sklá pre najbežnejšie modely.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 29 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'skladom / rýchle naskladnenie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kúpiť diel a overiť kompatibilitu', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 13, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'baterka-atd-bg-card', 'title' => 'Batérie, konektory a flex káble', 'description' => 'Batérie, konektory a flex káble pripravené na montáž.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 12 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'najpredávanejšie modely ihneď', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať náhradné komponenty', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 14, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'naradie-bg-card', 'title' => 'Servisné náradie pre opravy', 'description' => 'Skrutkovače, pinzety, otváracie sady a čistiace pomôcky.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 6 EUR', 'detail2_label' => 'Typy setov', 'detail2_value' => 'hobby, advanced, profi servis', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vybrať servisný set', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 15, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'doplnky-bg-card', 'title' => 'Doplnky a nabíjanie', 'description' => 'Kryty, káble, redukcie, powerbanky a bezkontaktné nabíjačky.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 5 EUR', 'detail2_label' => 'Doplnky', 'detail2_value' => 'aj príslušenstvo kompatibilné s MagSafe', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kúpiť doplnky a nabíjanie', 'button_href' => 'podstranky/objednat-servis.php'],

      ['id' => 16, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'folie-bg-card', 'title' => 'Ochranné sklá a fólie', 'description' => 'Tvrdené sklá a fólie, aj s nalepením na počkanie.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 7 EUR', 'detail2_label' => 'Služba', 'detail2_value' => 'odborná inštalácia na počkanie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Rezervovať ochranné sklo', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 17, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'puzdra-bg-card', 'title' => 'Puzdrá a kryty', 'description' => 'Bežné aj odolné kryty pre rôzne modely.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 9 EUR', 'detail2_label' => 'Dostupnosť', 'detail2_value' => 'desiatky modelov skladom', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kúpiť kryt pre svoj model', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 18, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'kable-bg-card', 'title' => 'Nabíjačky a káble', 'description' => 'Nabíjačky, káble a bezkontaktné nabíjanie.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 6 EUR', 'detail2_label' => 'Odporúčanie', 'detail2_value' => 'kompatibilita podľa výkonu zariadenia', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednať nabíjanie a káble', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 19, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'audio-bg-card', 'title' => 'Audio a držiaky', 'description' => 'Slúchadlá, držiaky do auta a stojany na stôl.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 12 EUR', 'detail2_label' => 'Vhodné pre', 'detail2_value' => 'prácu, šport aj bežné používanie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vybrať audio a držiaky', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
    ];
  }
}
