<?php
$cookieName = "cookiesAccepted";
$cookiesAccepted = $_COOKIE[$cookieName];
if (!$cookiesAccepted) {
  setcookie($cookieName, "1" , time() + 60 * 60 * 24 * 365);
}
$title = "";
$description = "";
$template = "";
$noIndex = false;
$ogImage = "";
switch ($_REQUEST["page"]) {
  case "oldschool808patterns":
    $title = "Oldschool 808 patterns - the most popular drum patterns for Reason";
    $description = "150 oldschool drum sequences for Reason. Start your oldschool jam now!";
    $template = "oldschool808patterns";
    $ogImage = "images/oldschool808patterns_og.jpg";
    break;
  case "kongking":
    $title = "Kong King - Patches for Reason Kong Drum Designer";
    $description = "50 drum kit patches for the Kong drum designer and 7 effect combinators. Let the rhythm hit 'em!";
    $template = "kongking";
    $ogImage = "images/kongking_og.jpg";
    break;
  case "complexcinema":
    $title = "Complex Cinema - Patches for the Reason Complex-1 Synthesizer";
    $description = "200 cinematic patches for the Complex-1 Modular Synthesizer. Complex soundtracks made simple!";
    $template = "complexcinema";
    $ogImage = "images/complexcinema_og.jpg";
    break;
  case "complexworld":
    $title = "Complex World - Patches for the Reason Complex-1 Synthesizer";
    $description = "200 innovative patches for your Complex-1 Modular Synthesizer. Get ready to explore a new world of sounds - it's a complex world!";
    $template = "complexworld";
    $ogImage = "images/complexworld_og.jpg";
    break;
  case "europaclub":
    $title = "Europaclub - Patches for the Reason Europa Synthesizer";
    $description = "180 rhytmic presets pushing the Europa Synthesizer its limit. Download the free demo now!";
    $template = "europaclub";
    $ogImage = "images/europaclub_og.jpg";
    break;
  case "eurotrip":
    $title = "Eurotrip - Refill for the Reason Europa Synthesizer";
    $description = "200 new presets for the Europa Synthesizer. Download the free demo now!";
    $template = "eurotrip";
    $ogImage = "images/eurotrip_og.jpg";
    break;
  case "terms":
    $title = "Terms & Imprint";
    $template = "terms";
    $noIndex = true;
    break;
  default:
    $title = "Loop Depot - Reason Refills & stuff";
    $description = "Presets, patches & sounds for Reason.";
    $template = "index";
}  
$content = file_get_contents("pages/" . $template . ".php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117488999-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-117488999-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <?php if ($description): ?>
      <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    <?php if ($noIndex): ?>
      <meta name="robots" content="noindex">
    <?php endif; ?>
    <?php if ($ogImage): ?>
      <meta property="og:image" content="<?php echo ($_SERVER['HTTPS'] === "on" ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/" . $ogImage; ?>">
      <meta property="og:image:width" content="500">
      <meta property="og:image:height" content="500">
    <?php endif; ?>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark rack <?php if($cookiesAccepted):?>mb-4<?php endif;?> <?php echo $template; ?>">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img class="" height="50" src="images/logo.svg" alt="Home">
        </a>
      </div>
    </nav>
    <?php if (!$cookiesAccepted): ?>
      <div class="rack cookies mb-4">
        <div class="container mt-4 mb-4">
          <div class="row">
            <div class="col-md-8">
              This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies.<br>
            </div>
            <div class="col-md-4 text-right">
              <a href="terms#privacy">more information</a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php echo $content; ?>
    <footer>
      <div class="container">
        <p class="text-right">
          <?php if ($template !== "terms"): ?>
            <a href="terms">terms & imprint</a>
          <?php endif; ?>
        </p>
      </div>
    </footer>
  </body>
</html>