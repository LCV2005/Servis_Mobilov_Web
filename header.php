<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$basePath = $basePath ?? '';
?>
<!DOCTYPE html>
<html lang="sk">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Servis Mobilov - rýchle opravy mobilných telefónov, diagnostika a výmena displejov.">
    <meta name="author" content="Servis Mobilov">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Servis Mobilov | Rýchly a spoľahlivý servis telefónov</title>

    <!-- Základné CSS Bootstrapu -->
    <link href="<?php echo $basePath; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Dodatočné CSS súbory -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1W4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/owl.css">

  </head>

<body>

  <!-- ***** Začiatok prednačítania ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Koniec prednačítania ***** -->

  <!-- ***** Začiatok oblasti hlavičky ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Začiatok loga ***** -->
            <a href="<?php echo $basePath; ?>index.php" class="logo">
              <img src="<?php echo $basePath; ?>assets/images/logo.png" alt="Servis Mobilov">
            </a>
            <!-- ***** Koniec loga ***** -->
            <!-- ***** Začiatok menu ***** -->
            <ul class="nav">
              <li><a href="<?php echo $basePath; ?>index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Domov</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php" class="<?php echo $currentPage === 'opravy-servis.php' ? 'active' : ''; ?>">Opravy a servis</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/nahradne-diely.php" class="<?php echo $currentPage === 'nahradne-diely.php' ? 'active' : ''; ?>">Náhradné diely</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/naradie.php" class="<?php echo $currentPage === 'naradie.php' ? 'active' : ''; ?>">Náradie</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php" class="<?php echo $currentPage === 'prislusenstvo.php' ? 'active' : ''; ?>">Príslušenstvo</a></li>
              <li><div class="gradient-button"><a href="<?php echo $basePath; ?>podstranky/objednat-servis.php" class="<?php echo $currentPage === 'objednat-servis.php' ? 'active' : ''; ?>"><i class="fa fa-tools"></i> Objednať servis</a></div></li>
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Koniec menu ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Koniec oblasti hlavičky ***** -->
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
                <span class="header_title">Rýchly kontakt</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Rýchle možnosti kontaktu -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
              <span class="icon"><i class="fa fa-phone"></i></span>
              <span class="icon_title">Zavolajte nám: +421 911 222 333</span>

                </a>

                <a href="#" class="social_box google">
              <span class="icon"><i class="fa fa-envelope"></i></span>
              <span class="icon_title">Napíšte nám: servis@servismobilov.sk</span>
                </a>
            </div>

            <div class="centeredText">
            <span>Alebo vyplňte formulár objednávky servisu</span>
            </div>

            <div class="action_btns">
            <div class="one_half"><a href="#" id="login_form" class="btn">Mám zariadenie v servise</a></div>
            <div class="one_half last"><a href="#" id="register_form" class="btn">Nová objednávka opravy</a></div>
            </div>
        </div>

        <!-- Formulár pre zákazníka s existujúcou opravou -->
        <div class="user_login">
            <form>
            <label>E-mail / telefón</label>
                <input type="text" />
                <br />

            <label>Kód zákazky</label>
            <input type="text" />
                <br />

                <div class="checkbox">
                    <input id="remember" type="checkbox" />
              <label for="remember">Súhlasím so spracovaním údajov na účely kontaktovania</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Späť</a></div>
              <div class="one_half last"><a href="#" class="btn btn_red">Odoslať dopyt</a></div>
                </div>
            </form>

          <a href="#" class="forgot_password">Nemáte kód zákazky? Kontaktujte nás telefonicky.</a>
        </div>

        <!-- Formulár novej objednávky opravy -->
        <div class="user_register">
            <form>
            <label>Meno a priezvisko</label>
                <input type="text" />
                <br />

            <label>E-mailová adresa alebo telefón</label>
                <input type="email" />
                <br />

            <label>Zariadenie a popis poruchy</label>
            <input type="text" />
                <br />

                <div class="checkbox">
                    <input id="send_updates" type="checkbox" />
              <label for="send_updates">Chcem dostávať informácie o stave opravy</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Späť</a></div>
              <div class="one_half last"><a href="#" class="btn btn_red">Odoslať objednávku</a></div>
                </div>
            </form>
        </div>
    </section>
</div>