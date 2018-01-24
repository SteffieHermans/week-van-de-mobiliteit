<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week van de Mobiliteit - <?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php echo $css;?>
    <script>
      WebFontConfig = {
        custom: {
          families: ['Futura', 'Intro Cond'],
          urls: ['assets/fonts/futura/futura.css', 'assets/fonts/intro-cond/intro-cond.css']
        }
      };

      (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = "https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);
    </script>
  </head>
  <body>
    <header class="main-header">
      <div class="container menu-container">
        <div class="logo">
          <h1 class="hide">Week van de Mobiliteit</h1>
          <a href="index.php">
            <img src="assets/img/logo.png" alt="Logo Week van de Mobiliteit" height="35" width="162">
          </a>
        </div>
        <div class="small-menu">
          <input class="burger-input" id="burger" type="checkbox" />

          <label class="burger-label" for="burger">
              <span></span>
              <span></span>
              <span></span>
          </label>

          <nav class="burger-menu">
            <ul class="burger-menu-list">
              <li class="burger-menu-list-item"><a class="burger-menu-link<?php if($currentPage == 'home') echo ' active';?>" href="index.php">Home</a></li>
              <li class="burger-menu-list-item"><a class="burger-menu-link<?php if($currentPage == 'programma') echo ' active';?>" href="index.php?page=programma">Programma</a></li>
              <li class="burger-menu-list-item"><a class="burger-menu-link<?php if($currentPage == 'overDeWeek') echo ' active';?>" href="#">Over de Week</a></li>
              <li class="burger-menu-list-item"><a class="burger-menu-link<?php if($currentPage == 'overDeActies') echo ' active';?>" href="#">Over de Acties</a></li>
              <li class="burger-menu-list-item"><a class="burger-menu-link<?php if($currentPage == 'nieuws') echo ' active';?>" href="#">Nieuws</a></li>
            </ul>
          </nav>
        </div>
        <nav class="big-menu">
          <ul class="menu">
            <li class="menu-item"><a class="menu-item-link<?php if($currentPage == 'home') echo ' active';?>" href="index.php">Home</a></li>
            <li class="menu-item"><a class="menu-item-link<?php if($currentPage == 'programma') echo ' active';?>" href="index.php?page=programma">Programma</a></li>
            <li class="menu-item"><a class="menu-item-link<?php if($currentPage == 'overDeWeek') echo ' active';?>" href="index.php?page=over-de-week">Over de Week</a></li>
            <li class="menu-item"><a class="menu-item-link<?php if($currentPage == 'overDeActies') echo ' active';?>" href="index.php?page=over-de-acties">Over de Acties</a></li>
            <li class="menu-item"><a class="menu-item-link<?php if($currentPage == 'nieuws') echo ' active';?>" href="index.php?page=nieuws">Nieuws</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <?php if($currentPage == 'home') echo '
        <section class="home-header">
          <img class="header-image" src="assets/img/power-hand.svg" width="166" height="290" alt="Power Fist Roadmap">
          <article class="header-article">
            <h2 class="main-title header-title">Meer Autominderen</h2>
            <p class="text-indent header-text">Ontdek wat jij kunt doen om te autominderen. Beleef de<br/> verschillende activiteiten!</p>
            <a class="btn" href=index.php?page=programma>Vind een Activiteit</a>
          </article>
        </section>
      '?>
      <?php if($currentPage == 'detail-page') echo '
        <section class="detail-header">
          <picture>
            <img class="detail-header-image"
              src="assets/img/ANT1-1440w.jpg"
              width="166" height="290"
              srcset="assets/img/ANT1-1440w.jpg 1440w,
                      ssets/img/ANT1-1080w.jpg 1080w,
                      ssets/img/ANT1-720w.jpg 720w,
                      ssets/img/ANT1-360w.jpg 360w"
              alt="Antwerpen ANT1 Header Image""/>
          </picture>

        </section>
      '?>
      <div class="container main-container">
        <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
        <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

        <?php echo $content; ?>
      </div>
    </main>

    <footer>
      <div class="container">
        <div class="footer-top-section">
          <section class="footer-section initiatiefnemer">
            <h2 class="footer-title">Een initiatief van het Netwerk Duurzame<br/> Mobiliteit (Komimo vzw)</h2>
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
            <h2 class="footer-title">Onze Partners</h2>
            <div class="partner-logos">
              <a href="https://www.vlaanderen.be/nl" class="partner-logo" target="_blank">
                <img src="assets/img/logo-vlaanderen-wit.png" alt="Logo Vlaamse Overheid, Logo Vlaanderen" width="83" height="36">
              </a>
              <a href="http://www.belgianrail.be/nl" class="partner-logo" target="_blank">
                <img src="assets/img/NMBS_logo_wit.png" alt="Logo NMBS" width="55" height="36">
              </a>
              <a href="https://www.delijn.be/nl/" class="partner-logo" target="_blank">
                <img src="assets/img/de_lijn_wit.png" alt="Logo De Lijn" width="38" height="37">
              </a>
              <a href="http://www.mobilityweek.eu" class="partner-logo" target="_blank">
                <img src="assets/img/logo_european_mobilityweek_wit.png" alt="Logo European Mobility Week" width="153" height="11">
              </a>
            </div>
          </section>
        </div>
        <div class="footer-bottom-section">
          <div class="media-buttons">
            <a href="https://www.facebook.com/Weekvandemobiliteit" class="media-button" target="_blank">
              <img src="assets/img/facebook.svg" alt="Facebook Icon" width="33" height="33">
            </a>
            <a href="https://twitter.com/week_mobiliteit" class="media-button" target="_blank">
              <img src="assets/img/twitter.svg" alt="Twitter Icon" width="33" height="33">
            </a>
            <a href="https://www.instagram.com/weekvandemobiliteit/" class="media-button" target="_blank">
              <img src="assets/img/instagram.svg" alt="Instagram Icon" width="33" height="33">
            </a>
          </div>
          <p class="copyright">&copy; 2018 - <a class="initiatiefnemer-link" href="https://www.duurzame-mobiliteit.be">Netwerk Duurzame Mobiliteit</a></p>
        </div>
      </div>
    </footer>

    <?php echo $js;?>
  </body>
</html>
