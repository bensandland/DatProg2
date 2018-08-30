<?php
    require_once "main.php";
    require_once "dbConn.php";
    $id = $_GET["id"];
    $type = $_GET["type"];
    $pretty_type = substr($type, 0, -1);
    if ($type == "players") {
        $sql = "SELECT `first_name`, `last_name`, `manager_id`, `club_id` FROM `players` WHERE id=$id";
    }
    elseif ($type == "managers") {
        $sql = "SELECT `first_name`, `last_name`, `club_id` FROM `managers` WHERE id=$id";
    }
    elseif ($type == "clubs") {
        $sql = "SELECT `name`, `manager_id` FROM `clubs` WHERE id=$id";
    }
    elseif ($type == "stadiums") {
        $sql = "SELECT `name`, `club_id` FROM `stadiums` WHERE id=$id";
    }
?>

<div id="container">
    <h5>Edit <?php echo $pretty_type ?></h5>
    <form method="post">
    <?php
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                if ($type == "players") {
                    echo "<div class='form-group'>";
                    echo "<label>First name</label>";
                    echo "<input type='text' class='form-control' name='fname' value=" . $row["first_name"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Last name</label>";
                    echo "<input type='text' class='form-control' name='lname' value=" . $row["last_name"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Manager ID</label>";
                    echo "<input type='text' class='form-control' name='mngr_id' 'value=" . $row["manager_id"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Club ID</label>";
                    echo "<input type='text' class='form-control' name='club_id' value=" . $row["club_id"] . ">";
                    echo "</div>";
                }
                if ($type == "managers") {
                    echo "<div class='form-group'>";
                    echo "<label>First name</label>";
                    echo "<input type='text' class='form-control' name='fname' value=" . $row["first_name"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Last name</label>";
                    echo "<input type='text' class='form-control' name='lname' value=" . $row["last_name"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Club ID</label>";
                    echo "<input type='text' class='form-control' name='club_id' value=" . $row["club_id"] . ">";
                    echo "</div>";
                }

                else if ($type == "clubs") {
                    echo "<div class='form-group'>";
                    echo "<label>Name</label>";
                    echo "<input type='text' class='form-control' name='name' value=" . $row["name"] . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Manager ID</label>";
                    echo "<input type='text' class='form-control' name='mngr_id' value=" . $row["manager_id"] . ">";
                    echo "</div>";
                }

                else if ($type == "stadiums") {
                    echo "<div class='form-group'>";
                    echo "<label>Name</label>";
                    echo "<input type='text' class='form-control' name='name' value=" . $stadiumName . ">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label>Club ID</label>";
                    echo "<input type='text' class='form-control' name='club_id' value=" . $row["club_id"] . ">";
                    echo "</div>";
                }
            }
        }
    ?>    
        <input type="submit" class="btn btn-primary">
    </form>
</div>

<?php
    if ($_POST) {
        if ($type == "players") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mngr_id = $_POST['mngr_id'];
            $club_id = $_POST['club_id'];
    
            if(empty($club_id) && empty($mngr_id)) {
                $sql = "UPDATE `players` SET `first_name` = '$fname', `last_name` = '$lname' WHERE id=$id";
            } else {
                $sql = "UPDATE `players` SET `first_name` = '$fname', `last_name` = '$lname', `club_id` = '$club_id', `manager_id` = '$mngr_id'
                WHERE id=$id";
            }
        }

        if ($type == "managers") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $club_id = $_POST['club_id'];

            if (empty($club_id)) {
                $sql = "UPDATE `managers` SET `first_name` = '$fname', `last_name` = '$lname' WHERE id=$id"; 
            } else {
                $sql = "UPDATE `managers` SET `first_name` = '$fname', `last_name` = '$lname', `club_id` = '$club_id' WHERE id=$id"; 
            }
        }

        if ($type == "clubs") {
            $name = $_POST["name"];
            $mngr_id = $_POST["mngr_id"];
            if (empty($mngr_id)) {
                $sql = "UPDATE `clubs` SET `name` = '$name'  WHERE id=$id";
            } else {
                $sql = "UPDATE `clubs` SET `name` = '$name', `manager_id` = '$mngr_id' WHERE id=$id";
            }
        }

        if ($type == "stadiums") {
            $name = $_POST["name"];
            $club_id = $_POST["club_id"];
            if (empty($club_id)) {
                $sql = "UPDATE `stadiums` SET `name` = '$name'  WHERE id=$id";
            } else {
                $sql = "UPDATE `stadiums` SET `name` = '$name', `club_id` = '$club_id' WHERE id=$id";
            }
        }

        if ($conn->query($sql) == TRUE) {
            echo "<span style='color:green;text-align:center;'><p>" . ucfirst($pretty_type) . " successfully updated!</p></span>";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }

?>