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
          <p>Vyplnte formular a my sa vam ozveme s cenou a terminom.</p>
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
            <?php if (!empty($serviceOrderData['service_type'])): ?>
              <div>Typ servisu: 
                <?php 
                  $serviceTypeLabel = [
                    'express' => 'Express servis',
                    'standard' => 'Standard servis',
                    'diagnostika' => 'Diagnostika bez zavazku'
                  ];
                  $type = $serviceOrderData['service_type'];
                  echo isset($serviceTypeLabel[$type]) ? htmlspecialchars($serviceTypeLabel[$type], ENT_QUOTES, 'UTF-8') : htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
                ?>
              </div>
            <?php endif; ?>
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
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Urgentne opravy</p>
                  </div>
                </label>
                <label style="cursor: pointer; text-align: center; display: inline-block;">
                  <input type="radio" name="service_type" value="standard" style="display: none;" class="service-radio">
                  <div class="service-option-box" style="padding: 20px; border: 2px solid #ddd; border-radius: 12px; transition: all 0.3s ease; width: 160px; height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="fa fa-wrench" style="font-size: 32px; color: #4b8ef1; display: block; margin-bottom: 10px;"></i>
                    <div style="font-weight: 700; color: #2a2a2a; font-size: 14px;">Standard servis</div>
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Bezne poruchy</p>
                  </div>
                </label>
                <label style="cursor: pointer; text-align: center; display: inline-block;">
                  <input type="radio" name="service_type" value="diagnostika" style="display: none;" class="service-radio">
                  <div class="service-option-box" style="padding: 20px; border: 2px solid #ddd; border-radius: 12px; transition: all 0.3s ease; width: 160px; height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="fa fa-search" style="font-size: 32px; color: #4b8ef1; display: block; margin-bottom: 10px;"></i>
                    <div style="font-weight: 700; color: #2a2a2a; font-size: 14px;">Diagnostika</div>
                    <p style="font-size: 12px; color: #999; margin: 8px 0 0 0;">Bez zavazku</p>
                  </div>
                </label>
              </div>
            </div>
            <script>
              document.querySelectorAll('.service-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                  document.querySelectorAll('.service-option-box').forEach(box => {
                    box.style.borderColor = '#ddd';
                    box.style.backgroundColor = 'transparent';
                  });
                  if (this.checked) {
                    this.nextElementSibling.style.borderColor = '#4b8ef1';
                    this.nextElementSibling.style.backgroundColor = 'rgba(75, 142, 241, 0.05)';
                  }
                });
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

        <div class="service-item" style="margin-top: 24px; margin-bottom: 24px;">
          <h4>Co sa deje po odoslani objednavky</h4>
          <p>1) Potvrdime prijatie. 2) Posleme cenu. 3) Dohodneme termin. 4) Opravime zariadenie.</p>
          <p><strong>Dolezite:</strong> cim presnejsi popis poruchy uvediete, tym rychlejsie pripravime riesenie.</p>
        </div>

        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Odporucania pred odovzdanim zariadenia</h4>
          <p>Pred odovzdanim odporucame zalohu dat a odhlasenie citlivych uctov.</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php">Pozriet odporucane prislusenstvo</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
