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
          <h4>Opravy a <em>servis zariadeni</em></h4>
          <img src="<?php echo $basePath; ?>assets/images/heading-line-dec.png" alt="">
          <p>Rychly servis mobilov, tabletov a smart zariadeni.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Vymena displeja a skla</h4>
          <p>Vymenime displej a otestujeme dotyk aj obraz.</p>
          <p><strong>Orientaena cena:</strong> od 39 EUR</p>
          <p><strong>Cas opravy:</strong> 60 - 180 minut</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat vymenu displeja</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Vymena baterie</h4>
          <p>Skontrolujeme stav baterie a vymenime ju za novu.</p>
          <p><strong>Orientaena cena:</strong> od 29 EUR</p>
          <p><strong>Cas opravy:</strong> 30 - 90 minut</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat vymenu baterie</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Oprava nabijania</h4>
          <p>Riesime problemy s nabijanim a konektorom.</p>
          <p><strong>Orientaena cena:</strong> od 35 EUR</p>
          <p><strong>Cas opravy:</strong> 1 - 2 pracovne dni</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Nahlasit poruchu nabijania</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Diagnostika poruchy</h4>
          <p>Zistime pricinu poruchy a navrhneme opravu.</p>
          <p><strong>Orientaena cena:</strong> od 15 EUR (odcitava sa pri realizacii opravy)</p>
          <p><strong>Cas diagnostiky:</strong> do 24 hodin</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Objednat diagnostiku</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Softverove sluzby</h4>
          <p>Pomozeme s obnovou systemu, prenosom dat a nastavenim telefonu.</p>
          <p><strong>Orientaena cena:</strong> od 19 EUR</p>
          <p><strong>Cas realizacie:</strong> podla rozsahu ulohy</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Vyziadat softverovy servis</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Post-zarucny servis pre firmy</h4>
          <p>Pre firmy ponukame pravidelny servis a rychlejsie vybavenie oprav.</p>
          <p><strong>Bonus:</strong> vyzdvihnutie zariadeni podla dohody</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Ziskat firemnu ponuku</a></div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="service-item" style="margin-bottom: 24px;">
          <h4>Priebeh servisu krok za krokom</h4>
          <p>1) Prijatie. 2) Diagnostika. 3) Schvalenie ceny. 4) Oprava. 5) Odovzdanie.</p>
          <p><strong>Platba:</strong> hotovost, karta, prevod na fakturu.</p>
          <div class="gradient-button" style="margin-top: 12px;"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Spustit objednavku servisu</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
