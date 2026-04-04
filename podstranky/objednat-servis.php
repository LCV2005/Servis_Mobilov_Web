<?php
$basePath = '../';
$isSubpage = true;
include __DIR__ . '/../header.php';
?>

<div class="main-banner subpage-banner">
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
        <form id="service-order-form" action="#" method="POST">
          <div class="row">
            <div class="col-lg-6">
              <fieldset style="margin-bottom: 16px;">
                <input type="text" name="meno" placeholder="Meno a priezvisko" required class="email">
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset style="margin-bottom: 16px;">
                <input type="text" name="kontakt" placeholder="Telefon alebo e-mail" required class="email">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset style="margin-bottom: 16px;">
                <input type="text" name="zariadenie" placeholder="Typ zariadenia (mobil, tablet, hodinky...)" required class="email">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset style="margin-bottom: 20px;">
                <textarea name="popis" rows="5" placeholder="Strucny popis poruchy" required style="width: 100%; border-radius: 12px; border: 1px solid #ddd; padding: 14px;"></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12 text-center">
              <fieldset>
                <button type="submit" class="main-button">Odoslat objednavku <i class="fa fa-angle-right"></i></button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
