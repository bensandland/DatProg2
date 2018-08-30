<?php
    if ($_POST) {
        require_once "dbConn.php";
        $name = $_POST['name'];
        $mngr_id = $_POST['mngr_id'];
        if (empty($mngr_id)) {
            $sql = "INSERT INTO `clubs` (`name`) VALUES ('$name')";
        } else {
            $sql = "INSERT INTO `clubs` (`name`, `manager_id`) VALUES ('$name', '$mngr_id')";
        }

        if ($conn->query($sql) == TRUE) {
            echo "<span style='color:green;text-align:center;'><p>Club added successfully!</p></span>";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
?>

<div class="container">
    <h5>Add club</h5>
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name of the club eg. Barcelona">
        </div>
        <div class="form-group">
            <label>Manager ID</label>
            <input type="text" class="form-control" name="mngr_id" placeholder="Enter manager ID">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>