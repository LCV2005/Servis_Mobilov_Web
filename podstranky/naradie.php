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
          <h4>Vymenne diely, <em>naradie</em> a doplnky</h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Jednoducha ponuka dielov, naradia a doplnkov pre prace s telefonmi.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="service-item vymenne-displeje-bg-card" style="margin-bottom: 24px;">
          <h4>Vymenne displeje a dotykove skla</h4>
          <p>Displeje a dotykove skla pre najbeznejsie modely.</p>
          <p><strong>Cena:</strong> od 29 EUR</p>
          <p><strong>Dostupnost:</strong> skladom / rychle naskladnenie</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Kupit diel a overit kompatibilitu</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item baterka-atd-bg-card" style="margin-bottom: 24px;">
          <h4>Baterie, konektory a flex kable</h4>
          <p>Baterie, konektory a flex kable pripravene na montaz.</p>
          <p><strong>Cena:</strong> od 12 EUR</p>
          <p><strong>Dostupnost:</strong> najpredavanejsie modely ihned</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat nahradne komponenty</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item naradie-bg-card" style="margin-bottom: 24px;">
          <h4>Servisne naradie pre opravy</h4>
          <p>Skrutkovace, pinzety, otvaracie sady a cistiace pomocky.</p>
          <p><strong>Cena:</strong> od 6 EUR</p>
          <p><strong>Typy setov:</strong> hobby, advanced, profi servis</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Vybrat servisny set</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item doplnky-bg-card" style="margin-bottom: 24px;">
          <h4>Doplnky a nabijanie</h4>
          <p>Kryty, kable, redukcie, powerbanky a bezkontaktne nabijacky.</p>
          <p><strong>Cena:</strong> od 5 EUR</p>
          <p><strong>Doplnky:</strong> aj MagSafe kompatibilne prislusenstvo</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Kupit doplnky a nabijanie</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item pajka-bg-card" style="margin-bottom: 24px;">
          <h4>Mikropajkovacie a ESD vybavenie</h4>
          <p>ESD vybavenie a pomocky pre jemne opravy dosiek.</p>
          <p><strong>Cena:</strong> od 4 EUR</p>
          <p><strong>Vhodne pre:</strong> servis dosiek a pokrocile opravy</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat ESD vybavenie</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item nastroje-bg-card" style="margin-bottom: 24px;">
          <h4>Montazne sady podla modelu</h4>
          <p>Sety diel + naradie pre konkretne modely telefonov.</p>
          <p><strong>Cena:</strong> od 34 EUR</p>
          <p><strong>Obsah:</strong> diel, tesnenie, montazny set, navod</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Rezervovat montazny balicek</a></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Ako prebieha nakup</h4>
          <p>Vyberte produkt, poslite model telefonu a my overime kompatibilitu.</p>
          <p><strong>Objednavky:</strong> telefonicky, e-mailom alebo cez kontaktne udaje na webe.</p>
          <p><strong>B2B vyhody:</strong> velkoobchodne ceny, priorita pri vybaveni a pravidelne skladove reporty.</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Odoslat poziadavku na nakup</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
