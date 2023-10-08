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
switch ($_REQUEST["page"]) {
  case "free":
    $title = "Free patches & combinators for Reason";
    $description = "Free combinators & patches for Reason";
    $template = "free";
    break;
  case "tributeneurotonepack":
    $title = "Tribute Neurotone Pack - 100 patches for ReGroove Mixer";
    $description = "100 patches for the ReGroove Mixer for Reason.";
    $template = "tributeneurotonepack";
    break;
  case "goodoldaysregrooves":
    $title = "Good Ol Days ReGrooves - 100 patches for ReGroove Mixer";
    $description = "100 patches for the ReGroove Mixer for Reason.";
    $template = "goodoldaysregrooves";
    break;
  case "amalgamcinema":
    $title = "Amalgam Cinema - 300 patches for Amalgam";
    $description = "300 patches for the Amalgam FM Synthesizer for Reason.";
    $template = "amalgamcinema";
    break;
  case "satisfriktion":
    $title = "Satisfriktion - 500 patches for Friktion";
    $description = "500 patches for the Friktion Modeled Strings Synthesizer for Reason.";
    $template = "satisfriktion";
    break;
  case "kickdrumsynthesizercollection":
    $title = "Kickdrum Synthesizer Collection - 4 kick drum combinators for Reason.";
    $description = "Four Combinator 2 kick drum generators for Reason.";
    $template = "kickdrumsynthesizercollection";
    break;
  case "multibandessentials":
    $title = "Multiband Essentials - 10 multiband effect devices for Reason.";
    $description = "10 multiband effect devices split your audio signal into 4 bands to apply individual effects on.";
    $template = "multibandessentials";
    break;
  case "rhythmicfxpack":
    $title = "Rhythmic FX Pack - 8 combinator effect devices for Reason";
    $description = "8 combinator effect devices for Reason. Gate and split like there is no tomorrow!";
    $template = "rhythmicfxpack";
    break;
  case "synthpower":
    $title = "Synth Power - Powerful synths to boost your up your productions";
    $description = "100 combinator patches to unleash the power of Reason!";
    $template = "synthpower";
    break;
  case "oldschool808patterns":
    $title = "Oldschool 808 patterns - The most popular drum patterns for Reason";
    $description = "150 oldschool drum sequences for Reason. Start your oldschool jam now!";
    $template = "oldschool808patterns";
    break;
  case "kongking":
    $title = "Kong King - Patches for Reason Kong Drum Designer";
    $description = "50 drum kit patches for the Kong drum designer and 7 effect combinators. Let the rhythm hit 'em!";
    $template = "kongking";
    break;
  case "complexcinema":
    $title = "Complex Cinema - Patches for the Reason Complex-1 Synthesizer";
    $description = "200 cinematic patches for the Complex-1 Modular Synthesizer. Complex soundtracks made simple!";
    $template = "complexcinema";
    break;
  case "complexworld":
    $title = "Complex World - Patches for the Reason Complex-1 Synthesizer";
    $description = "200 innovative patches for your Complex-1 Modular Synthesizer. Get ready to explore a new world of sounds - it's a complex world!";
    $template = "complexworld";
    break;
  case "europaclub":
    $title = "Europaclub - Patches for the Reason Europa Synthesizer";
    $description = "180 rhytmic presets pushing the Europa Synthesizer its limit. Download the free demo now!";
    $template = "europaclub";
    break;
  case "eurotrip":
    $title = "Eurotrip - Refill for the Reason Europa Synthesizer";
    $description = "200 new presets for the Europa Synthesizer. Download the free demo now!";
    $template = "eurotrip";
    break;
  case "terms":
    $title = "Terms & Imprint";
    $template = "terms";
    $noIndex = true;
    break;
  default:
    $title = "Loop Depot - ReFills, Combinators & patches for Reason";
    $description = "Presets, patches & sounds for Reason.";
    $template = "index";
}  
$content = file_get_contents("pages/" . $template . ".php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- Google tag (gtag.js) -->
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