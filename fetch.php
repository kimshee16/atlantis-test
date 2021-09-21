<?php
	include 'config.php';
	
	if($result = mysqli_query($conn, "select c.id,c.comments,u.name,c.createddate from comments c inner join user u on c.createdbyid = u.id")) {
					if(mysqli_num_rows($result) > 0) {
						$emparray = array();
					    while($row =mysqli_fetch_assoc($result))
					    {
					        $emparray[] = $row;
					    }

					} 
					echo json_encode(array("data" => $emparray));
	}

?>