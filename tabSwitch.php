<div class="container"> 
<h2><?php echo ucfirst($type); ?></h2>
	<ul>	
		<li><a href="<?php echo $type; ?>.php?page=add">Add <?php echo $type; ?></a></li>
		<li><a href="<?php echo $type; ?>.php?page=delete">Delete <?php echo $type; ?></a></li>
		<li><a href="<?php echo $type; ?>.php?page=update">Update <?php echo $type; ?></a></li>	
	</ul>
</div>

<?php    
    function tabSwitch($type) {
        if(isset($_GET['page'])) {
            switch($_GET['page']) {
                default:
                    break;
                case 'add':
                    $mode = "$type/add.php"; 
                    include($mode); 
                    break; 
                case 'delete':
                    $mode = "$type/delete.php";
                    include($mode); 
                    break; 
                case 'update':
                    $mode = "$type/update.php";
                    include($mode); 
                    break;
            }
        }
    }
?>