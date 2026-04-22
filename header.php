<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$basePath = $basePath ?? '';
$isSubpage = $isSubpage ?? false;

$serviceOrderData = null;
$newsletterEmail = null;
$popupLoginData = null;
$popupRegisterData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['service_order_submit'])) {
    $serviceOrderData = [
      'meno' => trim($_POST['meno'] ?? ''),
      'kontakt' => trim($_POST['kontakt'] ?? ''),
      'zariadenie' => trim($_POST['zariadenie'] ?? ''),
      'popis' => trim($_POST['popis'] ?? ''),
    ];
  }

  if (isset($_POST['newsletter_submit'])) {
    $newsletterEmail = trim($_POST['email'] ?? '');
  }

  if (isset($_POST['popup_login_submit'])) {
    $popupLoginData = [
      'kontakt' => trim($_POST['login_contact'] ?? ''),
      'kod' => trim($_POST['login_code'] ?? ''),
      'remember' => isset($_POST['remember']) ? 'ano' : 'nie',
    ];
  }

  if (isset($_POST['popup_register_submit'])) {
    $popupRegisterData = [
      'meno' => trim($_POST['register_name'] ?? ''),
      'kontakt' => trim($_POST['register_contact'] ?? ''),
      'zariadenie' => trim($_POST['register_device'] ?? ''),
      'updates' => isset($_POST['send_updates']) ? 'ano' : 'nie',
    ];
  }
}
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

    
    <link href="<?php echo $basePath; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1W4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/owl.css">

  </head>

<body class="<?php echo $isSubpage ? 'subpage-page' : ''; ?>">

  
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
  

  
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            
            <a href="<?php echo $basePath; ?>index.php" class="logo">
              <img src="<?php echo $basePath; ?>assets/images/logo.png" alt="Servis Mobilov">
            </a>
            
            
            <ul class="nav">
              <li><a href="<?php echo $basePath; ?>index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Domov</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/opravy-servis.php" class="<?php echo $currentPage === 'opravy-servis.php' ? 'active' : ''; ?>">Opravy a servis</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/nahradne-diely.php" class="<?php echo $currentPage === 'nahradne-diely.php' ? 'active' : ''; ?>">Náhradné diely</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/naradie.php" class="<?php echo $currentPage === 'naradie.php' ? 'active' : ''; ?>">Náradie</a></li>
              <li><a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php" class="<?php echo $currentPage === 'prislusenstvo.php' ? 'active' : ''; ?>">Príslušenstvo</a></li>
            </ul>        
            <div class="header-icons" aria-label="Rychly pristup">
              <a href="<?php echo $basePath; ?>podstranky/objednat-servis.php" class="header-icon" title="Vybrat zariadenie" aria-label="Vybrat zariadenie">
                <span class="header-icon-glyph" aria-hidden="true">M</span>
              </a>
              <a href="#modal" id="modal_trigger" class="header-icon" title="Ucet a prihlasenie" aria-label="Ucet a prihlasenie">
                <span class="header-icon-glyph" aria-hidden="true">U</span>
              </a>
              <a href="<?php echo $basePath; ?>podstranky/prislusenstvo.php" class="header-icon" title="Kosik" aria-label="Kosik">
                <span class="header-icon-glyph" aria-hidden="true">K</span>
              </a>
            </div>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            
          </nav>
        </div>
      </div>
    </div>
  </header>
  

  <?php if (!empty($popupLoginData)): ?>
    <div class="container" style="margin-top: 20px;">
      <div class="alert alert-info" style="border-radius: 16px;">
        <strong>Žiadosť o stav opravy odoslaná.</strong>
        <div>Kontakt: <?php echo htmlspecialchars($popupLoginData['kontakt'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div>Kód zákazky: <?php echo htmlspecialchars($popupLoginData['kod'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div>Zapamätať údaje: <?php echo htmlspecialchars($popupLoginData['remember'], ENT_QUOTES, 'UTF-8'); ?></div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!empty($popupRegisterData)): ?>
    <div class="container" style="margin-top: 20px;">
      <div class="alert alert-info" style="border-radius: 16px;">
        <strong>Nová objednávka z popup formulára odoslaná.</strong>
        <div>Meno: <?php echo htmlspecialchars($popupRegisterData['meno'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div>Kontakt: <?php echo htmlspecialchars($popupRegisterData['kontakt'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div>Zariadenie: <?php echo htmlspecialchars($popupRegisterData['zariadenie'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div>Chcem info o stave opravy: <?php echo htmlspecialchars($popupRegisterData['updates'], ENT_QUOTES, 'UTF-8'); ?></div>
      </div>
    </div>
  <?php endif; ?>
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
                <span class="header_title">Rýchly kontakt</span>
    <span class="modal_close" aria-label="Zavriet">&times;</span>
    </div>

    <section class="popupBody">
        
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
              <span class="icon" aria-hidden="true">&#9742;</span>
              <span class="icon_title">Zavolajte nám: +421 911 222 333</span>

                </a>

                <a href="#" class="social_box google">
              <span class="icon" aria-hidden="true">&#9993;</span>
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

        
        <div class="user_login">
          <form action="" method="POST">
          <label for="login_contact">E-mail / telefón</label>
            <input id="login_contact" type="text" name="login_contact" required />
                <br />

          <label for="login_code">Kód zákazky</label>
          <input id="login_code" type="text" name="login_code" required />
                <br />

                <div class="checkbox">
              <input id="remember" type="checkbox" name="remember" />
              <label for="remember">Súhlasím so spracovaním údajov na účely kontaktovania</label>
                </div>

                <div class="action_btns">
                  <div class="one_half"><a href="#" class="btn back_btn">&larr; Späť</a></div>
            <div class="one_half last"><button type="submit" name="popup_login_submit" class="btn btn_red">Odoslať dopyt</button></div>
                </div>
            </form>

          <a href="#" class="forgot_password">Nemáte kód zákazky? Kontaktujte nás telefonicky.</a>
        </div>

        
        <div class="user_register">
          <form action="" method="POST">
          <label for="register_name">Meno a priezvisko</label>
            <input id="register_name" type="text" name="register_name" required />
                <br />

          <label for="register_contact">E-mailová adresa alebo telefón</label>
            <input id="register_contact" type="text" name="register_contact" required />
                <br />

          <label for="register_device">Zariadenie a popis poruchy</label>
          <input id="register_device" type="text" name="register_device" required />
                <br />

                <div class="checkbox">
              <input id="send_updates" type="checkbox" name="send_updates" />
              <label for="send_updates">Chcem dostávať informácie o stave opravy</label>
                </div>

                <div class="action_btns">
                  <div class="one_half"><a href="#" class="btn back_btn">&larr; Späť</a></div>
            <div class="one_half last"><button type="submit" name="popup_register_submit" class="btn btn_red">Odoslať objednávku</button></div>
                </div>
            </form>
        </div>
    </section>
</div>