<?php
        require_once "dbConn.php";
        $sql = "SELECT `id`, `first_name`, `last_name` FROM `managers` WHERE 1";
?>

<div class="container">
    <h5>Delete</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . "<button class='btn btn-primary' onclick='window.location.href=\"deleteFunc.php?id=" . $row["id"] . "&type=managers\"'>Delete</button>" . "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </tbody>
    </table>
</div>