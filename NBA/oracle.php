<?php


// CONNECT / DISCONNECT
function dbConnect(){
    $conn=oci_connect("c##ivan","pass","localhost/orcl");
    If (!$conn) return 0;
    else return $conn;
}

function closeConnection($conn){
    oci_close($conn);
}

// TEAMS

function selectTeam($conn, $team){
    $sql = "select * from klubovi where naziv_kluba like '".$team."'";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $res);

    oci_close($conn);
    return $res;
}

// PLAYERS
function getPlayersCount($conn, $team){
    $sql = "select count(*) from igraci where klub_id=(select id_kluba from klubovi where naziv_kluba like '".$team."')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $playersCount);

    oci_close($conn);
    return $playersCount['COUNT(*)'][0];
}

function selectPlayersOfTeam($conn, $team){
    $sql = "select * from igraci where klub_id=(select id_kluba from klubovi where naziv_kluba like '".$team."')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $players);

    oci_close($conn);

    return $players;
}

function updatePlayer($conn, $playerID, $name, $lastName, $position, $height, $mass, $clubID){
    $sql = "update igraci set ime='".$name."', prezime='".$lastName."', pozicija='".$position."', visina=".$height.", masa=".$mass.", klub_id=".$clubID." where id_igraca=".$playerID;

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}


function insertPlayer($conn, $firstName, $lastName, $position, $height, $mass, $idTeam){
    $sql = "insert into igraci(ime, prezime, pozicija, visina, masa, klub_id) values('".$firstName."', '".$lastName."', '".$position."', '".$height."', '".$mass."', '".$idTeam."')";

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

function deletePlayer($conn, $playerID){
    $sql = "delete from igraci where id_igraca=".$playerID;

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

// COACHES
function getCoachCount($conn, $team){
    $sql = "select count(*) from treneri where klub_id=(select id_kluba from klubovi where naziv_kluba like '".$team."')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $coachCount);

    oci_close($conn);

    return $coachCount['COUNT(*)'][0];
}

function selectCoachesOfTeam($conn, $team){
    $sql = "select * from treneri where klub_id=(select id_kluba from klubovi where naziv_kluba like '".$team."')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $coaches);

    oci_close($conn);

    return $coaches;
}

function insertCoach($conn, $coachName, $coachLastname, $coachStatus, $coachClub){
    $sql = "insert into treneri(ime, prezime, status, klub_id) values('".$coachName."', '".$coachLastname."', '".$coachStatus."', ".$coachClub.")";

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

function deleteCoach($conn, $coachID){
    $sql = "delete from treneri where id_trenera=".$coachID;

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

// GAMES
function getGamesCount($conn){
    $sql = "select count(*) from utakmice";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $gamesCount);

    oci_close($conn);

    return $gamesCount['COUNT(*)'][0];
}

function selectGames($conn){
    $sql = "select u.id_utakmice, u.datum, k1.naziv_kluba as domaci, u.rezultat, k2.naziv_kluba as gosti, l.naziv from utakmice u join klubovi k1 on u.domaci_klub = k1.id_kluba join klubovi k2 on u.gostujuci_klub = k2.id_kluba join lige l on u.liga_id = l.id_lige";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $games);

    oci_close($conn);

    return $games;
}

function insertGame($conn, $gameTimestamp, $gameHome, $gameScore, $gameAway, $gameLeague){
    $sql = "insert into utakmice (datum, domaci_klub, rezultat, gostujuci_klub, liga_id) values (".$gameTimestamp.", '".$gameHome."', '".$gameScore."', '".$gameAway."', ".$gameLeague;

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

function deleteGame($conn, $gameID){
    $sql = "delete from utakmice where id_utakmice=".$gameID;

    $stid = oci_parse($conn, $sql);
    $return = oci_execute($stid);

    oci_close($conn);
    return $return;
}

// REFEREES
function getRefereeCount($conn, $gameID){
    $sql = "select count(*) from sudi where utakmice_id=".$gameID;

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $refereeCount);

    oci_close($conn);

    return $refereeCount['COUNT(*)'][0];
}

function getReferees($conn, $gameID){
    $sql = "select s.ime, s.prezime from suci s, sudi d where d.utakmice_id=".$gameID." and s.id_suca = d.suci_id";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $referees);

    oci_close($conn);

    return $referees;
}

// ARENAS
function selectTeamArena($conn, $team){
    return $arena;
}

function getTeamArena($conn, $teamID){
    $sql = "select * from arene where klub_id=".$teamID;

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    oci_fetch_all($stid, $arena);

    oci_close($conn);

    return $arena;
}

// LEAGUES


// SPONSORS


?>
