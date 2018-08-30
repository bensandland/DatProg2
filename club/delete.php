<?php
    require_once "dbConn.php";
    $sql = "SELECT `id`, `name` FROM `clubs` WHERE 1";
?>

<div class="container">
    <h5>Delete</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . "<button class='btn btn-primary' onclick='window.location.href=\"deleteFunc.php?id=" . $row["id"] . "&type=clubs\"'>Delete</button>" . "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </tbody>
    </table>
</div>