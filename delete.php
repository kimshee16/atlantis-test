<?php 

include 'config.php';

$commentid = $_GET['commentid'];

$sql = "DELETE FROM comments WHERE id = $commentid";

mysqli_query($conn, $sql);

mysqli_close($conn);

?>

