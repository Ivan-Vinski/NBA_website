<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Games played</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="gamesStyle.css"></link>
    <?php include '../oracle.php' ?>
</head>
<body>
  <?php
    include "../header.php";
    include "../login/login.php";
  ?>
  <section class="tableContainer">
        <table id="gamesTable">
            <tr>
                <th>Date</th>
                <th>Home</th>
                <th>Score</th>
                <th>Away</th>
                <th>League</th>
                <th>Referee 1</th>
                <th>Referee 2</th>
                <th>Referee 3</th>
            </tr>
            <?php
                $conn = dbConnect();
                $games = selectGames($conn);
                $gamesCount = getGamesCount($conn);
                for ($i = 0; $i < $gamesCount; $i++){
                    echo "<tr>";
                    echo "<td>".$games['DATUM'][$i]."</td>";
                    echo "<td>".$games['DOMACI'][$i]."</td>";
                    echo "<td>".$games['REZULTAT'][$i]."</td>";
                    echo "<td>".$games['GOSTI'][$i]."</td>";
                    echo "<td>".$games['NAZIV'][$i]."</td>";

                    $refereeCount = getRefereeCount($conn, $games['ID_UTAKMICE'][$i]);
                    $referee = getReferees($conn, $games['ID_UTAKMICE'][$i]);
                    for ($j = 0; $j <= $refereeCount; $j++){
                        if ($j > 1 && $refereeCount == 2){
                            echo "<td>-</td>";
                            break;
                        }
                        if ($j >= 1 && $refereeCount == 1){
                            echo "<td>-</td><td>-</td>";
                            break;
                        }
                        if ($j > 2 && $refereeCount == 3) break;
                        echo "<td>".$referee['IME'][$j]." ".$referee['PREZIME'][$j]."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
  </section>
  <?php include "../footer.php" ?>
</body>
</html>
