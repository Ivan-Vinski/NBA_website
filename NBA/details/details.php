<?php
  include '../oracle.php';
  $conn = dbConnect();
  if (!$conn) echo "Connection failed";
  // when 'deleteButton' is pressed
  if (isset($_POST['buttonDelete'])){
    if (deletePlayer($conn, $_POST['playerID'])){
      // ARE YOU SURE YOU WANT TO DELETE?
      header("Refresh:0");
    }
    else echo "<body><script>alert('Sorry, error.');</script></body>";
  }
 ?>

<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $_GET['team'] ?> </title>
    <link rel="stylesheet" type="text/css" href="./detailsStyle.css"></link>

</head>
<body>
  <?php
    include "../header.php";
    include "../login/login.php";
  ?>
  <section>
    <div id="title">
        <?php // Select from database a teams name and city to display as a title of the page
            $teamInfo = selectTeam($conn, $_GET['team']);
            echo '<h1>'.$teamInfo['GRAD'][0].' '.$teamInfo['NAZIV_KLUBA'][0].'</h1>';
        ?>
    </div>

    <div id="containerPlayers"> <!-- A space to put all players in -->
        <table id="tablicaIgraca"> <!-- Horizontal table of players -->
            <caption> Players </caption>

            <tr>
                <th>Player ID</th>
                <?php
                    $playersCount = getPlayersCount($conn, $_GET['team']);
                    $players = selectPlayersOfTeam($conn, $_GET['team']);
                    for ($i = 0; $i < $playersCount; $i++){
                        echo "<td>".$players['ID_IGRACA'][$i]."</td>";
                    }

                ?>
            </tr>
            <tr>
                <th>Name</th>
                <?php
                for ($i = 0; $i < $playersCount ; $i++){
                    echo '<td>'.$players['IME'][$i].'</td>';
                }
                ?>
            </tr>
            <tr>
                <th>Last name</th>
                <?php
                for ($i = 0; $i < $playersCount ; $i++){
                    echo '<td>'.$players['PREZIME'][$i].'</td>';
                }
                ?>
            </tr>
            <tr>
                <th>Position</th>
                <?php
                for ($i = 0; $i < $playersCount ; $i++){
                    echo '<td>'.$players['POZICIJA'][$i].'</td>';
                }
                ?>
            </tr>
            <tr>
                <th>Height</th>
                <?php
                for ($i = 0; $i < $playersCount ; $i++){
                    echo '<td>'.$players['VISINA'][$i].' cm'.'</td>';
                }
                ?>
            </tr>
            <tr>
                <th>Mass</th>
                <?php
                for ($i = 0; $i < $playersCount ; $i++){
                    echo '<td>'.$players['MASA'][$i].' kg'.'</td>';
                }
                ?>
            </tr>
            <tr id='deleteRow'>
                <th>Delete</th>
                <?php
                        for ($i = 0; $i < $playersCount; $i++){
                            echo "<form action='' method='post'>";
                            echo "<input type='hidden' name='playerID' value='".$players['ID_IGRACA'][$i]."'></input>";
                            echo "<td><button type='submit' id='buttonDelete' name='buttonDelete' class='deleteButtons'>.</button></form></td>";
                        }
                ?>
            </tr>
        </table>
    </div>
    <br>

    <div id="containerCoaches">
        <table id="tablicaTrenera">
            <tr>
                <th>Coach ID</th>
                <?php
                    $coachCount = getCoachCount($conn, $_GET['team']);
                    $coaches = selectCoachesOfTeam($conn, $_GET['team']);
                    for ($i = 0; $i < $coachCount; $i++){
                        echo "<td>".$coaches['ID_TRENERA'][$i]."</td>";
                    }
                ?>

            </tr>
            <tr>
                <th>Name</th>
                <?php
                    for ($i = 0; $i < $coachCount; $i++){
                        echo "<td>".$coaches['IME'][$i]."</td>";
                    }
                ?>
            </tr>
            <tr>
                <th>Last name</th>
                <?php
                    for ($i = 0; $i < $coachCount; $i++){
                        echo "<td>".$coaches['PREZIME'][$i]."</td>";
                    }
                ?>
            </tr>
            <tr>
                <th>Role</th>
                <?php
                    for ($i = 0; $i < $coachCount; $i++){
                        echo "<td>".$coaches['STATUS'][$i]."</td>";
                    }
                ?>
            </tr>

        </table>
    </div>
    <?php
        $teamArena = getTeamArena($conn, $players['KLUB_ID'][0]);
    ?>
    <br>
    <div id="arenaContainer">
      <h id="titleOfficialArena">Official Arena: <?php echo $teamArena['GRAD'][0]." ".$teamArena['NAZIV'][0]." (".$teamArena['ADRESA'][0].")" ?> </h>
    </div>

  </section>
  <?php include "../footer.php" ?>
</body>
</html>

<?php
// if user is logged in, show him 'deleteButtons'
if (isset($_SESSION['username'])){
  echo "<body><script> var x = document.getElementById('deleteRow'); x.style.display=''; </script></body>";
}
// user not logged, hide 'deleteButtons'
else{
  echo "<body><script> var x = document.getElementById('deleteRow'); x.style.display='none'; </script></body>";
}

?>
