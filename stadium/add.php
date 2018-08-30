<?php
    if ($_POST) {
        require_once "dbConn.php";

        $name = $_POST['name'];
        $club_id = $_POST['club_id'];
        if (empty($club_id)) {
            $sql = "INSERT INTO `stadiums` (`name`) VALUES ('$name')";
        } else {
            $sql = "INSERT INTO `stadiums` (`name`, `club_id`) VALUES ('$name', '$club_id')";
        }

        if ($conn->query($sql) == TRUE) {
            echo "<span style='color:green;text-align:center;'><p>Stadium added successfully!</p></span>";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
?>

<div class="container">
    <h5>Add stadium</h5>
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name of the club eg. Barcelona">
        </div>
        <div class="form-group">
            <label>Club ID</label>
            <input type="text" class="form-control" name="club_id" placeholder="Enter ID of the club which this stadium belongs to">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>