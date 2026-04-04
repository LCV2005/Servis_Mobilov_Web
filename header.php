<!DOCTYPE html>
<html lang="sk">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Chain App Dev - HTML5 šablóna vstupnej stránky aplikácie</title>

    <!-- Základné CSS Bootstrapu -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Dodatočné CSS súbory -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1W4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

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
            <a href="index.html" class="logo">
              <img src="assets/images/logo.png" alt="Chain App Dev">
            </a>
            <!-- ***** Koniec loga ***** -->
            <!-- ***** Začiatok menu ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Domov</a></li>
              <li class="scroll-to-section"><a href="#services">Služby</a></li>
              <li class="scroll-to-section"><a href="#about">O nás</a></li>
              <li class="scroll-to-section"><a href="#pricing">Cenník</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Novinky</a></li>
              <li><div class="gradient-button"><a id="modal_trigger" href="#modal"><i class="fa fa-sign-in-alt"></i> Prihlásiť sa</a></div></li> 
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
                <span class="header_title">Prihlásenie</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Prihlásenie cez sociálne siete -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Prepojiť s Facebookom</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Prepojiť s Googlom</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Alebo použite svoju e-mailovú adresu</span>
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Prihlásiť sa</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Registrovať sa</a></div>
            </div>
        </div>

        <!-- Prihlasovací formulár s používateľským menom a heslom -->
        <div class="user_login">
            <form>
                <label>E-mail / používateľské meno</label>
                <input type="text" />
                <br />

                <label>Heslo</label>
                <input type="password" />
                <br />

                <div class="checkbox">
                    <input id="remember" type="checkbox" />
                    <label for="remember">Zapamätať si ma na tomto počítači</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Späť</a></div>
                    <div class="one_half last"><a href="#" class="btn btn_red">Prihlásiť sa</a></div>
                </div>
            </form>

            <a href="#" class="forgot_password">Zabudli ste heslo?</a>
        </div>

        <!-- Registračný formulár -->
        <div class="user_register">
            <form>
                <label>Celé meno</label>
                <input type="text" />
                <br />

                <label>E-mailová adresa</label>
                <input type="email" />
                <br />

                <label>Heslo</label>
                <input type="password" />
                <br />

                <div class="checkbox">
                    <input id="send_updates" type="checkbox" />
                    <label for="send_updates">Posielajte mi občasné e-mailové aktualizácie</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Späť</a></div>
                    <div class="one_half last"><a href="#" class="btn btn_red">Registrovať sa</a></div>
                </div>
            </form>
        </div>
    </section>
</div>