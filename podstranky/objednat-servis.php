<?php
require_once __DIR__ . '/../app/StaticPage.php';

(new StaticPage('../', true))->render(function (PageData $page): void {
  $basePath = $page->basePath();
  $serviceOrderData = $page->serviceOrderData();
?>

<div class="subpage-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading text-center">
          <h4>Objednať <em>servis</em></h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Vyplňte formulár a my sa vám ozveme s cenou a termínom.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <?php if (!empty($serviceOrderData)): ?>
          <div class="alert alert-success" style="margin-bottom: 24px; border-radius: 16px;">
            <strong>Objednávka prijatá.</strong>
            <div>ID objednávky: <?php echo View::e((string) ($serviceOrderData['id'] ?? '')); ?></div>
            <div>Meno a priezvisko: <?php echo View::e($serviceOrderData['meno']); ?></div>
            <div>Telefón alebo e-mail: <?php echo View::e($serviceOrderData['kontakt']); ?></div>
            <div>Typ zariadenia: <?php echo View::e($serviceOrderData['zariadenie']); ?></div>
            <div>Popis poruchy: <?php echo View::e($serviceOrderData['popis']); ?></div>
            <div>Zvolený typ servisu: <?php echo View::e(FormHandler::serviceTypeLabel($serviceOrderData['service_type'])); ?></div>
          </div>
        <?php endif; ?>

        <form id="service-order-form" class="service-order-card" action="#" method="POST">
          <div class="row">
            <div class="col-lg-12" style="margin-bottom: 24px;">
              <div style="display: block; margin-bottom: 12px; font-weight: 700;">Vyberte typ servisu:</div>
              <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <label style="cursor: pointer; text-align: center; display: inline-block;">
                  <input type="radio" name="service_type" value="express" style="display: none;" class="service-radio">
                  <div class="service-option-box" style="padding: 20px; border: 2px solid #ddd; border-radius: 12px; transition: all 0.3s ease; width: 160px; height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="fa fa-bolt" style="font-size: 32px; color: #4b8ef1; display: block; margin-bottom: 10px;"></i>
                    <div style="font-weight: 700; color: #2a2a2a; font-size: 14px;">Express servis</div>
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Urgentné opravy</p>
                  </div>
                </label>
                <label style="cursor: pointer; text-align: center; display: inline-block;">
                  <input type="radio" name="service_type" value="standard" style="display: none;" class="service-radio">
                  <div class="service-option-box" style="padding: 20px; border: 2px solid #ddd; border-radius: 12px; transition: all 0.3s ease; width: 160px; height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="fa fa-wrench" style="font-size: 32px; color: #4b8ef1; display: block; margin-bottom: 10px;"></i>
                    <div style="font-weight: 700; color: #2a2a2a; font-size: 14px;">Standard servis</div>
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Bežné poruchy</p>
                  </div>
                </label>
                <label style="cursor: pointer; text-align: center; display: inline-block;">
                  <input type="radio" name="service_type" value="diagnostika" style="display: none;" class="service-radio">
                  <div class="service-option-box" style="padding: 20px; border: 2px solid #ddd; border-radius: 12px; transition: all 0.3s ease; width: 160px; height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="fa fa-search" style="font-size: 32px; color: #4b8ef1; display: block; margin-bottom: 10px;"></i>
                    <div style="font-weight: 700; color: #2a2a2a; font-size: 14px;">Diagnostika</div>
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Bez záväzku</p>
                  </div>
                </label>
              </div>
            </div>
            <script>
              window.addEventListener('DOMContentLoaded', function() {
                window.initServiceTypeOptions();
              });
            </script>
            <div class="col-lg-6">
              <fieldset>
                <label for="meno">Meno a priezvisko</label>
                <input id="meno" type="text" name="meno" placeholder="Meno a priezvisko" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="kontakt">Telefón alebo e-mail</label>
                <input id="kontakt" type="text" name="kontakt" placeholder="Telefón alebo e-mail" required>
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
                <textarea id="popis" name="popis" rows="5" placeholder="Stručný popis poruchy" required></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12 text-center">
              <fieldset class="service-order-actions">
                <button type="submit" name="service_order_submit" class="main-button">Odoslať objednávku <i class="fa fa-angle-right"></i></button>
              </fieldset>
            </div>
          </div>
        </form>

        <div class="service-item" style="margin-top: 24px; margin-bottom: 24px;">
          <h4>Čo sa deje po odoslaní objednávky</h4>
          <p>1) Potvrdíme prijatie. 2) Pošleme cenu. 3) Dohodneme termín. 4) Opravíme zariadenie.</p>
          <p><strong>Dôležité:</strong> čím presnejší popis poruchy uvediete, tým rýchlejšie pripravíme riešenie.</p>
        </div>

        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Odporúčania pred odovzdaním zariadenia</h4>
          <p>Pred odovzdaním odporúčame zálohu dát a odhlásenie citlivých účtov.</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php">Pozrieť odporúčané príslušenstvo</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
});
?>
