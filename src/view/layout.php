<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week van de Mobiliteit - <?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php echo $css;?>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <h1 class="hide">Week van de Mobiliteit</h1>
          <a href="index.php">
            <img src="assets/img/logo.png" alt="Logo Week van de Mobiliteit" height="35" width="162">
          </a>
        </div>
        <nav>
          <ul class="menu">
            <li class="menu-item"><a <?php if($currentPage == 'home') echo 'class="active"';?> href="index.php">Home</a></li>
            <li class="menu-item"><a <?php if($currentPage == 'programma') echo 'class="active"';?> href="index.php?page=programma">Programma</a></li>
            <li class="menu-item"><a <?php if($currentPage == 'overDeWeek') echo 'class="active"';?> href="index.php?page=over-de-week">Over de Week</a></li>
            <li class="menu-item"><a <?php if($currentPage == 'overDeActies') echo 'class="active"';?> href="index.php?page=over-de-acties">Over de Acties</a></li>
            <li class="menu-item"><a <?php if($currentPage == 'nieuws') echo 'class="active"';?> href="index.php?page=nieuws">Nieuws</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <?php echo $content; ?>
    </div>

    <footer>
      <div class="container">
        <div class="footer-top-section">
          <section class="footer-section initiatiefnemer">
            <h2>Een initiatief van het Netwerk Duurzame Mobiliteit (Komimo vzw)</h2>
            <address>
              Kasteellaan 349a<br/>
              9000 Gent
            </address>
            <p>
              tel. 09 331 59 10<br/>
              email. info@duurzame-mobiliteit.be
            </p>
          </section>
          <section class="footer-section partners">
            <h2>Onze Partners</h2>
            <div class="partner-logos">
              <a href="#" class="partner-logo">
                <img src="assets/img/logo-vlaanderen-wit.png" alt="Logo Vlaamse Overheid, Logo Vlaanderen" width="83" height="36">
              </a>
              <a href="#" class="partner-logo">
                <img src="assets/img/NMBS_logo_wit.png" alt="Logo NMBS" width="55" height="36">
              </a>
              <a href="#" class="partner-logo">
                <img src="assets/img/de_lijn_wit.png" alt="Logo De Lijn" width="38" height="37">
              </a>
              <a href="#" class="partner-logo">
                <img src="assets/img/logo_european_mobilityweek_wit.png" alt="Logo European Mobility Week" width="153" height="11">
              </a>
            </div>
          </section>
        </div>
        <div class="footer-bottom-section">
          <div class="media-buttons">
            <a href="#" class="media-button">
              <img src="assets/img/facebook.svg" alt="Facebook Icon" width="33" height="33">
            </a>
            <a href="#" class="media-button">
              <img src="assets/img/twitter.svg" alt="Twitter Icon" width="33" height="33">
            </a>
            <a href="#" class="media-button">
              <img src="assets/img/instagram.svg" alt="Instagram Icon" width="33" height="33">
            </a>
          </div>
          <p>&copy; 2018 - Netwerk Duurzame Mobiliteit</p>
        </div>
      </div>
    </footer>

    <?php echo $js;?>
  </body>
</html>
