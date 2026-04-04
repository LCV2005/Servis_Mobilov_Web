<?php
$basePath = '../';
$isSubpage = true;
include __DIR__ . '/../header.php';
?>

<div class="subpage-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading text-center">
          <h4>Objednat <em>servis</em></h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Vyplnte formular a my vas budeme kontaktovat s terminom a odhadom ceny opravy.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <?php if (!empty($serviceOrderData)): ?>
          <div class="alert alert-success" style="margin-bottom: 24px; border-radius: 16px;">
            <strong>Objednávka prijatá.</strong> Údaje z formulára:
            <div>Meno: <?php echo htmlspecialchars($serviceOrderData['meno'], ENT_QUOTES, 'UTF-8'); ?></div>
            <div>Kontakt: <?php echo htmlspecialchars($serviceOrderData['kontakt'], ENT_QUOTES, 'UTF-8'); ?></div>
            <div>Zariadenie: <?php echo htmlspecialchars($serviceOrderData['zariadenie'], ENT_QUOTES, 'UTF-8'); ?></div>
            <div>Popis: <?php echo htmlspecialchars($serviceOrderData['popis'], ENT_QUOTES, 'UTF-8'); ?></div>
          </div>
        <?php endif; ?>

        <form id="service-order-form" class="service-order-card" action="#" method="POST">
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <label for="meno">Meno a priezvisko</label>
                <input id="meno" type="text" name="meno" placeholder="Meno a priezvisko" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="kontakt">Telefon alebo e-mail</label>
                <input id="kontakt" type="text" name="kontakt" placeholder="Telefon alebo e-mail" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <label for="zariadenie">Typ zariadenia</label>
                <input id="zariadenie" type="text" name="zariadenie" placeholder="Mobil, tablet, hodinky..." required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <label for="popis">Popis poruchy</label>
                <textarea id="popis" name="popis" rows="5" placeholder="Strucny popis poruchy" required></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12 text-center">
              <fieldset class="service-order-actions">
                <button type="submit" name="service_order_submit" class="main-button">Odoslat objednavku <i class="fa fa-angle-right"></i></button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
