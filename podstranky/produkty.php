<?php
require_once __DIR__ . '/../app/StaticPage.php';
require_once __DIR__ . '/../app/AdminPageItemsController.php';

$controller = new AdminPageItemsController(AuthService::default(), PageItemRepository::default(), $_SERVER, $_GET, $_POST);

(new StaticPage('../', true))->render(function (PageData $page) use ($controller): void {
  $basePath = $page->basePath();
  $auth = $controller->auth();
  $items = $controller->items();
  $user = $auth->user();
  $isAdmin = $auth->isAdmin();
  $selectedPage = $controller->selectedPage();
  $editingItem = $controller->editingItem();
  $pageItems = $controller->selectedPageItems();
  $message = $controller->message();
  $error = $controller->error();
?>

<div class="subpage-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading text-center">
          <h4>CRUD správa <em>obsahu podstránok</em></h4>
          <img src="<?php echo View::e($basePath); ?>assets/images/heading-line-dec.png" alt="">
          <p>Vyberte podstránku a upravujte iba karty, ktoré patria do tejto konkrétnej podstránky.</p>
        </div>
      </div>
    </div>

    <?php if ($message !== ''): ?>
      <div class="alert alert-success" style="border-radius: 16px;"><?php echo View::e($message); ?></div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
      <div class="alert alert-danger" style="border-radius: 16px;"><?php echo View::e($error); ?></div>
    <?php endif; ?>

    <?php if (!$isAdmin): ?>
      <div class="service-item" style="margin-bottom: 24px;">
        <h4>Pre správu obsahu sa prihláste do admin účtu</h4>
        <p>CRUD operácie sú dostupné iba pre admina. Prihlasovacie údaje: ADMIN0@gmail.com / 123456.</p>
      </div>
    <?php else: ?>
      <div class="service-item" style="margin-bottom: 24px;">
        <h4>Prihlásený admin</h4>
        <p><?php echo View::e($user['meno']); ?>, <?php echo View::e($user['email']); ?></p>
      </div>

      <form action="<?php echo View::e($basePath); ?>podstranky/produkty.php" method="GET" class="service-order-card" style="margin-bottom: 24px;">
        <fieldset>
          <label for="page-picker">Vyberte podstránku</label>
          <select id="page-picker" name="page" class="form-control" onchange="this.form.submit()">
            <?php foreach ($items->pages() as $pageKey => $pageLabel): ?>
              <option value="<?php echo View::e($pageKey); ?>" <?php echo $selectedPage === $pageKey ? 'selected' : ''; ?>>
                <?php echo View::e($pageLabel); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </fieldset>
      </form>

      <div class="row">
        <div class="col-lg-5">
          <form class="service-order-card" action="<?php echo View::e($basePath); ?>podstranky/produkty.php" method="POST">
            <input type="hidden" name="page" value="<?php echo View::e($selectedPage); ?>">
            <?php if ($editingItem !== null): ?>
              <input type="hidden" name="id" value="<?php echo View::e((string) $editingItem['id']); ?>">
            <?php endif; ?>

            <fieldset>
              <label for="title">Nadpis karty</label>
              <input id="title" type="text" name="title" value="<?php echo View::e($editingItem['title'] ?? ''); ?>" required>
            </fieldset>

            <fieldset>
              <label for="description">Popis</label>
              <textarea id="description" name="description" rows="3" required><?php echo View::e($editingItem['description'] ?? ''); ?></textarea>
            </fieldset>

            <fieldset>
              <label for="detail1_label">Detail 1 názov</label>
              <input id="detail1_label" type="text" name="detail1_label" value="<?php echo View::e($editingItem['detail1_label'] ?? ''); ?>" placeholder="Cena / Orientačná cena">
            </fieldset>

            <fieldset>
              <label for="detail1_value">Detail 1 hodnota</label>
              <input id="detail1_value" type="text" name="detail1_value" value="<?php echo View::e($editingItem['detail1_value'] ?? ''); ?>" placeholder="od 39 EUR">
            </fieldset>

            <fieldset>
              <label for="detail2_label">Detail 2 názov</label>
              <input id="detail2_label" type="text" name="detail2_label" value="<?php echo View::e($editingItem['detail2_label'] ?? ''); ?>" placeholder="Čas opravy / Dostupnosť">
            </fieldset>

            <fieldset>
              <label for="detail2_value">Detail 2 hodnota</label>
              <input id="detail2_value" type="text" name="detail2_value" value="<?php echo View::e($editingItem['detail2_value'] ?? ''); ?>" placeholder="60 - 180 minút">
            </fieldset>

            <fieldset>
              <label for="detail3_label">Detail 3 názov</label>
              <input id="detail3_label" type="text" name="detail3_label" value="<?php echo View::e($editingItem['detail3_label'] ?? ''); ?>">
            </fieldset>

            <fieldset>
              <label for="detail3_value">Detail 3 hodnota</label>
              <input id="detail3_value" type="text" name="detail3_value" value="<?php echo View::e($editingItem['detail3_value'] ?? ''); ?>">
            </fieldset>

            <fieldset>
              <label for="button_text">Text tlačidla</label>
              <input id="button_text" type="text" name="button_text" value="<?php echo View::e($editingItem['button_text'] ?? ''); ?>">
            </fieldset>

            <fieldset>
              <label for="button_href">Odkaz tlačidla</label>
              <input id="button_href" type="text" name="button_href" value="<?php echo View::e($editingItem['button_href'] ?? ''); ?>">
            </fieldset>

            <fieldset>
              <label for="column_class">Bootstrap šírka karty</label>
              <input id="column_class" type="text" name="column_class" value="<?php echo View::e($editingItem['column_class'] ?? 'col-lg-6'); ?>">
            </fieldset>

            <fieldset>
              <label for="css_class">CSS trieda pozadia</label>
              <input id="css_class" type="text" name="css_class" value="<?php echo View::e($editingItem['css_class'] ?? ''); ?>">
            </fieldset>

            <div class="service-order-actions text-center">
              <?php if ($editingItem !== null): ?>
                <button type="submit" name="item_update_submit" class="main-button">Upraviť položku <i class="fa fa-angle-right"></i></button>
                <a href="<?php echo View::e($basePath); ?>podstranky/produkty.php?page=<?php echo View::e($selectedPage); ?>" class="btn" style="margin-top: 12px;">Zrušiť úpravu</a>
              <?php else: ?>
                <button type="submit" name="item_create_submit" class="main-button">Pridať položku <i class="fa fa-angle-right"></i></button>
              <?php endif; ?>
            </div>
          </form>
        </div>

        <div class="col-lg-7">
          <div class="service-item" style="margin-bottom: 24px;">
            <h4>Položky: <?php echo View::e($items->pages()[$selectedPage]); ?></h4>
            <?php if (empty($pageItems)): ?>
              <p>Pre túto podstránku ešte nie sú pridané žiadne položky.</p>
            <?php else: ?>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nadpis</th>
                      <th>Detail 1</th>
                      <th>Detail 2</th>
                      <th>Akcie</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pageItems as $item): ?>
                      <tr>
                        <td><?php echo View::e($item['title']); ?></td>
                        <td><?php echo View::e(($item['detail1_label'] ? $item['detail1_label'] . ': ' : '') . $item['detail1_value']); ?></td>
                        <td><?php echo View::e(($item['detail2_label'] ? $item['detail2_label'] . ': ' : '') . $item['detail2_value']); ?></td>
                        <td>
                          <a href="<?php echo View::e($basePath); ?>podstranky/produkty.php?page=<?php echo View::e($selectedPage); ?>&edit=<?php echo View::e((string) $item['id']); ?>" class="btn">Upraviť</a>
                          <form action="<?php echo View::e($basePath); ?>podstranky/produkty.php" method="POST" style="display:inline;">
                            <input type="hidden" name="page" value="<?php echo View::e($selectedPage); ?>">
                            <input type="hidden" name="id" value="<?php echo View::e((string) $item['id']); ?>">
                            <button type="submit" name="item_delete_submit" class="btn btn_red">Vymazať</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
});
?>
