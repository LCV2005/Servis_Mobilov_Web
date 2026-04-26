<?php
$basePath = '../';
$isSubpage = true;
include __DIR__ . '/../header.php';
?>

<div class="subpage-content nahradne-diely-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading text-center">
          <h4>Nahradne <em>diely na predaj</em></h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Predaj nahradnych dielov pre telefony a tablety. Vyberiete diel, overime kompatibilitu a tovar pripravime na odber alebo odoslanie.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="service-item display-bg-card" style="margin-bottom: 24px;">
          <h4>Displeje a predne skla</h4>
          <p>LCD, OLED a predne skla pre najbeznejsie modely telefonov.</p>
          <p><strong>Cena:</strong> od 24 EUR</p>
          <p><strong>Dostupnost:</strong> skladom / na objednavku do 48 hodin</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Overit kompatibilitu a objednat</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item baterie-bg-card" style="margin-bottom: 24px;">
          <h4>Baterie a napajacie moduly</h4>
          <p>Nahradne baterie, charging porty a suvisiace moduly.</p>
          <p><strong>Cena:</strong> od 11 EUR</p>
          <p><strong>Dostupnost:</strong> najpredavanejsie modely ihned</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat diel pre svoj model</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item kamery-bg-card" style="margin-bottom: 24px;">
          <h4>Kamery, reproduktory a mikrofony</h4>
          <p>Predna a zadna kamera, reproduktory a mikrofony.</p>
          <p><strong>Cena:</strong> od 9 EUR</p>
          <p><strong>Dostupnost:</strong> podla modelu zariadenia</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Zistit dostupnost dielu</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item kryty-bg-card" style="margin-bottom: 24px;">
          <h4>Zadny kryt, tlacidla a drobne suciastky</h4>
          <p>Zadne kryty, tlacidla, SIM tray a male diely pre dokoncene opravy.</p>
          <p><strong>Cena:</strong> od 4 EUR</p>
          <p><strong>Dostupnost:</strong> rychle doskladnenie</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Rezervovat suciastky</a></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Kvalitativne triedy a zaruka</h4>
          <p>Diely ponukame v triedach Original, OEM a A+ kompatibilne.</p>
          <p><strong>Zaruka:</strong> 6 az 24 mesiacov podla typu dielu</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Vyziadat odporucenie dielu</a></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Ako objednat diely</h4>
          <p>Poslite znacku, model a diel. My overime dostupnost a posleme cenu.</p>
          <p><strong>B2B spolupraca:</strong> pravidelne odbery, mnozstevne ceny a priorita pri naskladneni.</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Prejst na objednavku</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
