<?php 

include 'config.php';

$commentid = $_GET['commentid'];
$comment = $_GET['comment'];

$sql = "UPDATE comments SET comments = '$comment' WHERE id = '$commentid' ";

mysqli_query($conn, $sql);

mysqli_close($conn);

?>