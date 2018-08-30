<?php
    require_once "db/dbConn.php";
    $id = $_GET["id"];
    $type = $_GET["type"];
    $pretty_type = substr($type, 0, -1);

    $sql = "DELETE FROM `$type` WHERE id=$id";

    if ($conn->query($sql) == TRUE) {
        echo "<span style='color:green;text-align:center;'><p>" . ucfirst($pretty_type) . " successfully deleted!</p></span>";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>