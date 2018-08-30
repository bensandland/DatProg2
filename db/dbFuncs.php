<?php
    require_once "dbConn.php";

    function getPlayers() {

    }

    function getManagers() {

    }

    function getClubs() {
        $sql = "SELECT `name` FROM `clubs` WHERE 1";
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                printf ("%s <br>", $row["name"]);
            }
        } else {
            return false;
        }
    }

    function getStadiums() {

    }
?>