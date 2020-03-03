<?php
    include './login/login.php';
    if(isset($_GET["logout"])){
        if(session_destroy()){
            header("Location: index.php?loggedOut=true");
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <title>NBA</title>
  </head>
  <body>
      <header>
        <nav>
            <a href="./index.php" class="left"><img src="./Rescources/homeButton.png" alt="homeButton" id="homeButtonImg" class="toolbarIcons"></img></a>
            <a href="./games/games.php" class="left"><img src="./Rescources/gamesIcon.jpg" alt="gamesIcon" id="gamesIcon" class="toolbarIcons"></img></a>
            <a href="./login/loginPage.php" class="right"><img src="./Rescources/settingsIcon.png" alt="settingsIcon" id="settingsIcon" class="toolbarIcons"></img></a>
            <a href="./index.php?logout=true" class="right"><img src="./Rescources/logoutIcon.png" alt="logoutIcon" id="logoutIcon" class="toolbarIcons"></img></a>
        </nav>
      </header>

      <section>
        <div class="west">
          <div class="titleContainer">
            <h1>West</h1>
          </div>
          <div class="gridContainer">
            <a href="./details/details.php?team=Nuggets"><img src="./Rescources/west/Denver_Nuggets.jpg" id="nuggets" class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Timberwolves"><img src="./Rescources/west/Minnesota_Timberwolves.jpg" id="timberwolves" class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Thunder"><img src="./Rescources/west/Oklahoma_Thunder.jpg" id="thunder" id="thunder" class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Blazers"><img src="./Rescources/west/Portland_Blazers.jpg" id="blazers"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Jazz"><img src="./Rescources//west/Utah_Jazz.jpg" id="jazz"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Warriors"><img src="./Rescources//west/GoldenState_Warriors.jpg" id="warriors"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Clippers"><img src="./Rescources/west/LosAngeles_Clippers.jpg" id="clippers"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Lakers"><img src="./Rescources/west/LosAngeles_Lakers.jpg" id="lakers"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Suns"><img src="./Rescources/west/Pheonix_Suns.jpeg" id="suns"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Kings"><img src="./Rescources/west/Sacramento_Kings.jpg" id="kings"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Mavericks"><img src="./Rescources/west/Dallas_Mavericks.jpg" id="mavericks"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Rockets"><img src="./Rescources/west/Houston_Rockets.jpg" id="rockets"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Grizzlies"><img src="./Rescources/west/Memphis_Grizzlies.jpg" id="grizzlies"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Pelicans"><img src="./Rescources/west/NewOrleans_Pelicans.jpg" id="pelicans"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Spurs"><img src="./Rescources/west/SanAntonio_Spurs.jpg" id="spurs"  class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>

          </div>
        </div>

        <div class="east">
          <div class="titleContainer">
            <h1>East</h1>
          </div>
          <div class="gridContainer">
            <a href="./details/details.php?team=Celtics"><img src="./Rescources/east/Boston_Celtics.jpg" id="celtics" class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Nets"><img src="./Rescources/east/Brooklyn_Nets.jpg" id="nets" class="logo" onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Knicks"><img src="./Rescources/east/NewYork_Knicks.jpg" id="Knicks" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=76ers"><img src="./Rescources/east/Philadelphia_76ers.jpg" id="76ers" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Raptors"><img src="./Rescources/east/Toronto_Raptors.jpg" id="raptors" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Bulls"><img src="./Rescources/east/Chicago_Bulls.jpg" id="bulls" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Cavaliers"><img src="./Rescources/east/Cleveland_Cavaliers.jpg" id="cavaliers" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Pistons"><img src="./Rescources/east/Detroit_Pistons.jpg" id="pistons" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Pacers"><img src="./Rescources/east/Indiana_Pacers.jpg" id="pacers" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Bucks"><img src="./Rescources/east/Milwaukee_Bucks.jpg" id="bucks" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Hawks"><img src="./Rescources/east/Atlanta_Hawks.jpg" id="hawks" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Hornets"><img src="./Rescources/east/Charlotte_Hornets.jpg" id="hornets" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>

            <a href="./details/details.php?team=Heat"><img src="./Rescources/east/Miami_Heat.jpg" id="heat" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Magic"><img src="./Rescources/east/Orlando_Magic.jpg" id="magic" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>
            <a href="./details/details.php?team=Wizards"><img src="./Rescources/east/Washington_Wizards.jpg" id="wizards" class="logo"  onmouseover="omover(this)" onmouseout="omout(this)"></a>

          </div>
        </div>
      </section>

      <footer>
          <div class="container">
            <div class="info">
              <p>ivinski@foi.hr</p>
            </div>
            <div class="social">
              <a href="https://www.linkedin.com/in/ivanvinski"><img src="./Rescources/linkedin.png" alt="linkedInLogo" id="linkedinLogo"></img></a>
            </div>
          </div>
      </footer>
  </body>
</html>


<?php //This is at the bottom, so the page first loads, and then, alert is displayed
  if (isset($_GET["loggedOut"])) echo "<body><script>alert('Logout successful.');</script></body>";
?>
