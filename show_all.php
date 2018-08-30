<?php
	require_once "main.php";
	require_once "db/dbConn.php";	
?>

<div class="container">
	<div class="row">
		<div class="col-sm">	
			<h2>All clubs</h2>
			<?php
				$sql = "SELECT `name` FROM `clubs` WHERE 1";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						printf ("%s <br>", $row["name"]);
					}
				}
			?>
		</div>
		<div class="col-sm">
			<h2>All managers</h2>
			<?php 
				$sql = "SELECT `first_name`, `last_name` FROM `managers` WHERE 1";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						printf ("%s %s <br>", $row["first_name"], $row["last_name"]);
					}
				}
			?>
		</div>
		<div class="col-sm">
			<h2>All players</h2>
			<?php 
				$sql = "SELECT `first_name`, `last_name` FROM `players` WHERE 1";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						printf ("%s %s <br>", $row["first_name"], $row["last_name"]);
					}
				}
			?>
		</div>

		<div class="col-sm">
			<h2>All stadiums</h2>
			<?php 
				$sql = "SELECT `name` FROM `stadiums` WHERE 1";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						printf ("%s <br>", $row["name"]);
					}
				}
			?>
		</div>
	</div>
</div>
</body>
</html>