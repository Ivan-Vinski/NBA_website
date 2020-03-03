<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="settingsStyle.css" ></link>
    <?php include '../oracle.php'; ?>
    <?php include '../login/login.php'; ?>
</head>
<body>
  <?php include "../header.php" ?>
  <section>
    <div class="tab">
      <button class="tablinks" onmouseover="openForms(event, 'players')">Players</button>
      <button class="tablinks" onmouseover="openForms(event, 'coaches')">Coaches</button>
      <button class="tablinks" onmouseover="openForms(event, 'games')">Games</button>
      <button class="tablinks" onmouseover="openForms(event, 'referees')">Referees</button>
      <button class="tablinks" onmouseover="openForms(event, 'arenas')">Arenas</button>
      <button class="tablinks" onmouseover="openForms(event, 'leagues')">Leagues</button>
      <button class="tablinks" onmouseover="openForms(event, 'sponsors')">Sponsors</button>
    </div>
    <!-- EDIT PLAYERS FORMS -->
    <div id="players" class="tabContent">
      <div class="playersForms">
        <h id="titleAddPlayer" class="titleSettings">ADD PLAYER</h>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="firstName" placeholder="Name"><br>
            <input type="text" name="lastName" placeholder="Last name"><br>
            <input type="text" name="position" placeholder="Position"><br>
            <input type="text" name="height" placeholder="Height"><br></input>
            <input type="text" name="mass" placeholder="Mass"><br>
            <input type="text" name="id_team" placeholder="Club ID"><br>
            <input type="submit" value="Add" class="redSubmit">
        </form>
      </div>

      <div class="playersForms">
        <h id="titleUpdatePlayer" class="titleSettings">UPDATE PLAYER</h>
        <form action="" method="post" id="updatePlayerForm">
            <input type="text" name="updatePlayerID" placeholder="Player ID"><br>
            <input type="text" name="updateFirstName" placeholder="New first name"><br>
            <input type="text" name="updateLastName" placeholder="New last name"><br>
            <input type="text" name="updatePosition" placeholder="New position"><br>
            <input type="text" name="updateHeight" placeholder="New height"><br>
            <input type="text" name="updateMass" placeholder="New mass"><br>
            <input type="text" name="updateIDTeam" placeholder="New club ID"><br>
            <input type="submit" value="Update" class="redSubmit">
        </form>
      </div>

      <div class="playersForms">
        <h id="titleDeletePlayer" class="titleSettings">DELETE PLAYER</h>
        <form action="" method="post" id="deletePlayerForm" >
            <input type="text" name="playerID" placeholder="Player ID"><br>
            <input type="submit" value="Delete" class="redSubmit">
        </form>
      </div>
    </div>

    <!-- EDIT COACHES -->
    <div id="coaches" class="tabContent">
      <div class="coachesForms">
        <h id="titleAddCoaches" class="titleSettings">ADD COACH</h>
        <form action="" method="post">
            <input type="text" name="coachName" placeholder="First name"><br>
            <input type="text" name="coachLastname" placeholder="Last name"><br>
            <input type="text" name="coachStatus" placeholder="Status"><br>
            <input type="text" name="coachClub" placeholder="Club ID"><br>
            <input type="submit" value="Add" class="redSubmit">
        </form>
      </div>

      <div class="coachesForms">
        <h id="titleUpdateCoach" class="titleSettings">UPDATE COACH</h>
        <form action="" method="post">
          <input type="text" name="coachID" placeholder="Coach ID"><br>
          <input type="text" name="newCoachName" placeholder="New name"><br>
          <input type="text" name="newCoachLastName" placeholder="New last name"><br>
          <input type="text" name="newCoachStatus" placeholder="New status"><br>
          <input type="text" name="newCoachClub" placeholder="New Club ID"><br>
          <input type="submit" value="Update" class="blueSubmit">
        </form>
      </div>

      <div class="coachesForms">
        <h id="titleDeleteCoach" class="titleSettings">DELETE COACH</h>
        <form action="" method="post" id="deleteCoachForm">
            <input type="text" name="coachID" placeholder="Coach ID"><br>
            <input type="submit" value="Delete" class="redSubmit">
        </form>
      </div>
    </div>

    <div id="games" class="tabContent">
      <!-- EDIT GAMES -->
      <h id="titleAddPlayer" class="titleSettings">ADD A GAME</h>
      <form action="" method="post" id="gameForm">
          <input type="text" name="gameTimestamp" placeholder="Date"><br>
          <input type="text" name="gameHome" placeholder="Home"><br>
          <input type="text" name="gameScore" placeholder="Score"><br>
          <input type="text" name="gameAway" placeholder="Away"><br>
          <input type="text" name="gameLeague" placeholder="League"><br>
          <input type="submit" value="Add" class="blueSubmit">
      </form>

      <h id="titleDeleteGame" class="titleSettings">DELETE GAME</h>
      <form action="" method="post" id="deleteGameForm">
          <input type="text" name="gameID" placeholder="Game ID"><br>
          <input type="submit" value="Delete" class="redSubmit">
      </form>
    </div>
    <div id="referees" class="tabContent">
      <p>Referees</p>
    </div>


    <div id="arenas" class="tabContent">
      <p>Arenas</p>
    </div>


    <div id="leagues" class="tabContent">
      <p>Leagues</p>
    </div>


    <div id="sponsors" class="tabContent">
      <p>Sponsors</p>
    </div>

  </section>
  <?php include "../footer.php" ?>
</body>

<script>
function openForms(evt, formName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabContent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(formName).style.display = "grid";
  document.getElementById(formName).style.gridTemplateColumns = "repeat(auto-fit, minmax(230px, 1fr))";
  document.getElementById(formName).style.left = "5%";
  document.getElementById(formName).style.top = "5%";
  document.getElementById(formName).style.height = "95%";
  document.getElementById(formName).style.width = "95%";
  evt.currentTarget.className += " active";
}
</script>

</html>
<?php
$conn = dbConnect();
if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['position']) && isset($_POST['height']) && isset($_POST['mass']) && isset($_POST['id_team'])){
    if (insertPlayer($conn, $_POST['firstName'], $_POST['lastName'], $_POST['position'], $_POST['height'], $_POST['mass'], $_POST['id_team'])){
        echo "<body><script>alert('Player added.');</script></body>";
    }
    else echo "<body><script>alert('Sorry, error.');</script></body>";

}

else if(isset($_POST['updatePlayerID']) && isset($_POST['updateFirstName']) && isset($_POST['updateLastName']) && isset($_POST['updatePosition']) && isset($_POST['updateHeight']) && isset($_POST['updateMass']) && isset($_POST['updateIDTeam'])) {
    if (updatePlayer($conn, $_POST['updatePlayerID'], $_POST['updateFirstName'], $_POST['updateLastName'], $_POST['updatePosition'], $_POST['updateHeight'], $_POST['updateMass'], $_POST['updateIDTeam'])){
        echo "<body><script>alert('Player updated.');</script></body>";
    }
    else echo "<body><script>alert('Sorry, error.');</script></body>";
}

else if(isset($_POST['coachName']) && isset($_POST['coachLastname']) && isset($_POST['coachStatus']) && isset($_POST['coachClub'])){
    if (insertCoach($conn, $_POST['coachName'],$_POST['coachLastname'], $_POST['coachStatus'], $_POST['coachClub'])){
        echo "<body><script>alert('Coach added.');</script></body>";
    }
    else echo "<body><script>alert('Sorry, error.');</script></body>";

}

else if(isset($_POST['playerID'])){
    if (deletePlayer($conn, $_POST['playerID'])) echo "<body><script>alert('Player deleted');</script></body>";
    else echo "<body><script>alert('Sorry, error.');</script></body>";
}

else if(isset($_POST['gameTimestamp']) && isset($_POST['gameHome']) && isset($_POST['gameScore']) && isset($_POST['gameAway']) && isset($_POST['gameLeague'])){
    if (insertGame($conn, $_POST['gameTimestamp'], $_POST['gameHome'], $_POST['gameScore'], $_POST['gameAway'], $_POST['gameLeague'])) echo "<body><script>alert('Game added.');</script></body>";
    else echo "<body><script>alert('Sorry, error.');</script></body>";
}

else if(isset($_POST['gameID'])){
    if (deleteGame($conn, $_POST['gameID'])) echo "<body><script>alert('Game deleted');</script></body>";
    else echo "<body><script>alert('Doslo je do greske');</script></body>";
}

else if(isset($_POST['coachID'])){
    if (deleteCoach($conn, $_POST['coachID'])) echo "<body><script>alert('Referee deleted');</script></body>";
    else echo "<body><script>alert('Sorry, error.');</script></body>";
}

?>
