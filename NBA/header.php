<?php
    if(isset($_GET["logout"])){
        if(session_destroy()){
            header("Location: ../index.php?loggedOut=true");
        }
    }
?>
<header>
  <nav>
      <a href="../index.php" class="left"><img src="../Rescources/homeButton.png" alt="homeButton" id="homeButtonImg" class="toolbarIcons"></img></a>
      <a href="../games/games.php" class="left"><img src="../Rescources/gamesIcon.jpg" alt="gamesIcon" id="gamesIcon" class="toolbarIcons"></img></a>
      <a href="../login/loginPage.php" class="right"><img src="../Rescources/settingsIcon.png" alt="settingsIcon" id="settingsIcon" class="toolbarIcons"></img></a>
      <a href="../index.php?logout=true" class="right"><img src="../Rescources/logoutIcon.png" alt="logoutIcon" id="logoutIcon" class="toolbarIcons"></img></a>
  </nav>
</header>

<style>
  header{
    min-height: 50px;
  }

  nav{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    justify-items: center;
  }
  .right:hover{
    background-color: rgb(0, 110, 185);
    border-radius: 50%;
  }

  .left:hover{
    background-color: rgb(228, 42, 81);
    border-radius: 50%;
  }


  .toolbarIcons{
    height: 30px;
    margin: 10px;
  }
</style>
