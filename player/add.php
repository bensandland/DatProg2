<?php
    require_once "dbConn.php";

    if ($_POST) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $club_id = $_POST['club_id'];
        $mngr_id = $_POST['mngr_id'];

        if(empty($club_id) && empty($mngr_id)) {
            $sql = "INSERT INTO `players` (`first_name`, `last_name`, `club_id`, `manager_id`) 
            VALUES ('$fname', '$lname', '$club_id', '$mngr_id')";
        } else {
            $sql = "INSERT INTO `players` (`first_name`, `last_name`) 
            VALUES ('$fname', '$lname')";
        }

        if ($conn->query($sql) == TRUE) {
            echo "<span style='color:green;text-align:center;'><p>Player added successfully!</p></span>";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
?>

<div class="container">
    <h5>Add player</h5>
    <form method="post">
        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label>Club ID</label>
            <input type="text" class="form-control" name="club_id" placeholder="Enter club ID">
        </div>
        <div class="form-group">
            <label>Manager ID</label>
            <input type="text" class="form-control" name="mngr_id" placeholder="Enter manager ID">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>