<?php

require_once __DIR__ . '/Database.php';

class PageItemRepository
{
  private PDO $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;

    if (empty($this->all())) {
      $this->seedDefaults();
    }
  }

  public static function default(): self
  {
    return new self(Database::connection());
  }

  public function pages(): array
  {
    return [
      'opravy-servis' => 'Opravy a servis',
      'nahradne-diely' => 'Nahradne diely',
      'naradie' => 'Naradie',
      'prislusenstvo' => 'Prislusenstvo',
    ];
  }

  public function all(): array
  {
    return $this->db->query('SELECT * FROM page_items ORDER BY id ASC')->fetchAll();
  }

  public function byPage(string $page): array
  {
    $statement = $this->db->prepare('SELECT * FROM page_items WHERE page = :page ORDER BY id ASC');
    $statement->execute(['page' => $page]);

    return $statement->fetchAll();
  }

  public function find(int $id): ?array
  {
    $statement = $this->db->prepare('SELECT * FROM page_items WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $id]);
    $item = $statement->fetch();

    return $item ?: null;
  }

  public function create(array $data): void
  {
    $item = $this->fromPost($data);
    $this->insert($item, false);
  }

  public function update(int $id, array $data): void
  {
    $item = $this->fromPost($data);
    $item['id'] = $id;

    $statement = $this->db->prepare(
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
    $statement = $this->db->prepare('DELETE FROM page_items WHERE id = :id');
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

    $statement = $this->db->prepare(
      'INSERT INTO page_items (' . implode(', ', $columns) . ')
       VALUES (:' . implode(', :', $columns) . ')'
    );

    $statement->execute(array_intersect_key($item, array_flip($columns)));
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
      ['id' => 1, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Vymena displeja a skla', 'description' => 'Vymenime displej a otestujeme dotyk aj obraz.', 'detail1_label' => 'Orientacna cena', 'detail1_value' => 'od 39 EUR', 'detail2_label' => 'Cas opravy', 'detail2_value' => '60 - 180 minut', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat vymenu displeja', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 2, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Vymena baterie', 'description' => 'Skontrolujeme stav baterie a vymenime ju za novu.', 'detail1_label' => 'Orientacna cena', 'detail1_value' => 'od 29 EUR', 'detail2_label' => 'Cas opravy', 'detail2_value' => '30 - 90 minut', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat vymenu baterie', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 3, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Oprava nabijania', 'description' => 'Riesime problemy s nabijanim a konektorom.', 'detail1_label' => 'Orientacna cena', 'detail1_value' => 'od 35 EUR', 'detail2_label' => 'Cas opravy', 'detail2_value' => '1 - 2 pracovne dni', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Nahlasit poruchu nabijania', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 4, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Diagnostika poruchy', 'description' => 'Zistime pricinu poruchy a navrhneme opravu.', 'detail1_label' => 'Orientacna cena', 'detail1_value' => 'od 15 EUR (odcitava sa pri realizacii opravy)', 'detail2_label' => 'Cas diagnostiky', 'detail2_value' => 'do 24 hodin', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat diagnostiku', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 5, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Softverove sluzby', 'description' => 'Pomozeme s obnovou systemu, prenosom dat a nastavenim telefonu.', 'detail1_label' => 'Orientacna cena', 'detail1_value' => 'od 19 EUR', 'detail2_label' => 'Cas realizacie', 'detail2_value' => 'podla rozsahu ulohy', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vyziadat softverovy servis', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 6, 'page' => 'opravy-servis', 'column_class' => 'col-lg-6', 'css_class' => '', 'title' => 'Post-zarucny servis pre firmy', 'description' => 'Pre firmy ponukame pravidelny servis a rychlejsie vybavenie oprav.', 'detail1_label' => 'Bonus', 'detail1_value' => 'vyzdvihnutie zariadeni podla dohody', 'detail2_label' => '', 'detail2_value' => '', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Ziskat firemnu ponuku', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 7, 'page' => 'opravy-servis', 'column_class' => 'col-lg-12', 'css_class' => '', 'title' => 'Priebeh servisu krok za krokom', 'description' => '1) Prijatie. 2) Diagnostika. 3) Schvalenie ceny. 4) Oprava. 5) Odovzdanie.', 'detail1_label' => 'Platba', 'detail1_value' => 'hotovost, karta, prevod na fakturu.', 'detail2_label' => '', 'detail2_value' => '', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Spustit objednavku servisu', 'button_href' => 'podstranky/objednat-servis.php'],

      ['id' => 8, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'display-bg-card', 'title' => 'Displeje a predne skla', 'description' => 'LCD, OLED a predne skla pre najbeznejsie modely telefonov.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 24 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'skladom / na objednavku do 48 hodin', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Overit kompatibilitu a objednat', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 9, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'baterie-bg-card', 'title' => 'Baterie a napajacie moduly', 'description' => 'Nahradne baterie, charging porty a suvisiace moduly.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 11 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'najpredavanejsie modely ihned', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat diel pre svoj model', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 10, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'kamery-bg-card', 'title' => 'Kamery, reproduktory a mikrofony', 'description' => 'Predna a zadna kamera, reproduktory a mikrofony.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 9 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'podla modelu zariadenia', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Zistit dostupnost dielu', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 11, 'page' => 'nahradne-diely', 'column_class' => 'col-lg-6', 'css_class' => 'kryty-bg-card', 'title' => 'Zadny kryt, tlacidla a drobne suciastky', 'description' => 'Zadne kryty, tlacidla, SIM tray a male diely pre dokoncene opravy.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 4 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'rychle doskladnenie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Rezervovat suciastky', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],

      ['id' => 12, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'vymenne-displeje-bg-card', 'title' => 'Vymenne displeje a dotykove skla', 'description' => 'Displeje a dotykove skla pre najbeznejsie modely.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 29 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'skladom / rychle naskladnenie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kupit diel a overit kompatibilitu', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 13, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'baterka-atd-bg-card', 'title' => 'Baterie, konektory a flex kable', 'description' => 'Baterie, konektory a flex kable pripravene na montaz.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 12 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'najpredavanejsie modely ihned', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat nahradne komponenty', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 14, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'naradie-bg-card', 'title' => 'Servisne naradie pre opravy', 'description' => 'Skrutkovace, pinzety, otvaracie sady a cistiace pomocky.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 6 EUR', 'detail2_label' => 'Typy setov', 'detail2_value' => 'hobby, advanced, profi servis', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vybrat servisny set', 'button_href' => 'podstranky/objednat-servis.php'],
      ['id' => 15, 'page' => 'naradie', 'column_class' => 'col-lg-6', 'css_class' => 'doplnky-bg-card', 'title' => 'Doplnky a nabijanie', 'description' => 'Kryty, kable, redukcie, powerbanky a bezkontaktne nabijacky.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 5 EUR', 'detail2_label' => 'Doplnky', 'detail2_value' => 'aj MagSafe kompatibilne prislusenstvo', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kupit doplnky a nabijanie', 'button_href' => 'podstranky/objednat-servis.php'],

      ['id' => 16, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'folie-bg-card', 'title' => 'Ochranne skla a folie', 'description' => 'Tvrdene skla a folie, aj s nalepenim na pockanie.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 7 EUR', 'detail2_label' => 'Sluzba', 'detail2_value' => 'odborna instalacia na pockanie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Rezervovat ochranne sklo', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 17, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'puzdra-bg-card', 'title' => 'Puzdra a kryty', 'description' => 'Bezne aj odolne kryty pre rozne modely.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 9 EUR', 'detail2_label' => 'Dostupnost', 'detail2_value' => 'desiatky modelov skladom', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Kupit kryt pre svoj model', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 18, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'kable-bg-card', 'title' => 'Nabijacky a kable', 'description' => 'Nabijacky, kable a bezkontaktne nabijanie.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 6 EUR', 'detail2_label' => 'Odporucanie', 'detail2_value' => 'kompatibilita podla vykonu zariadenia', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Objednat nabijanie a kable', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
      ['id' => 19, 'page' => 'prislusenstvo', 'column_class' => 'col-lg-6', 'css_class' => 'audio-bg-card', 'title' => 'Audio a drziaky', 'description' => 'Sluchadla, drziaky do auta a stojany na stol.', 'detail1_label' => 'Cena', 'detail1_value' => 'od 12 EUR', 'detail2_label' => 'Vhodne pre', 'detail2_value' => 'pracu, sport aj bezne pouzivanie', 'detail3_label' => '', 'detail3_value' => '', 'button_text' => 'Vybrat audio a drziaky', 'button_href' => 'https://www.alza.sk/prislusenstvo-pre-mobilne-telefony/18844551.htm'],
    ];
  }
}
