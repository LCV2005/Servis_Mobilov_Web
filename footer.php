<?php $basePath = $basePath ?? ''; ?>
  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Získajte tipy na starostlivosť o telefón, tablet aj smart hodinky a aktuálne servisné akcie</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          <form id="newsletter-form" action="#" method="POST">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <input type="email" name="email" class="email" placeholder="E-mailová adresa..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <button type="submit" class="main-button">Odoberať novinky <i class="fa fa-angle-right"></i></button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Kontaktujte nás</h4>
            <p>Hlavná 123, 010 01 Žilina</p>
            <p><a href="tel:+421911222333">+421 911 222 333</a></p>
            <p><a href="mailto:servis@servismobilov.sk">servis@servismobilov.sk</a></p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>O nás</h4>
            <ul>
              <li><a href="<?php echo $basePath; ?>index.php">Domov</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php">Opravy a servis</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/nahradne-diely.php">Náhradné diely</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php">Príslušenstvo</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/naradie.php">Náradie</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Užitočné odkazy</h4>
            <ul>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php">Výmena displeja</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php">Výmena batérie</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php">Diagnostika porúch</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/naradie.php">Orientačný cenník</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php">Kontakt a objednávka</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>O našej spoločnosti</h4>
            <div class="logo">
              <img src="<?php echo $basePath; ?>assets/images/white-logo.png" alt="Servis Mobilov">
            </div>
            <p>Sme lokálny servis mobilov a ďalších zariadení. Opravujeme rýchlo, transparentne a s dôrazom na kvalitu náhradných dielov.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Skripty -->
  <script src="<?php echo $basePath; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $basePath; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $basePath; ?>assets/js/owl-carousel.js"></script>
  <script src="<?php echo $basePath; ?>assets/js/animation.js"></script>
  <script src="<?php echo $basePath; ?>assets/js/imagesloaded.js"></script>
  <script src="<?php echo $basePath; ?>assets/js/popup.js"></script>
  <script src="<?php echo $basePath; ?>assets/js/custom.js"></script>
</body>
</html>