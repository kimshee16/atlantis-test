<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Atlantis Test</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Atlantis Test</h2>
		</br>
		Admin Admin
		</br></br>
		<input type="hidden" name="name" id="name" value="Admin Admin">
		<input type="hidden" name="name" id="nameid" value="2">
		<input type="hidden" name="name" id="commentid">
		<textarea class="formcontrol" placeholder="Add comment" id="comment"></textarea></br>
		<button id='add' class='btn btn-default' onclick="clickAdd();">+</button>
		<table class="table">
			<thead>
				<tr>
					<th>Comment</th>
					<th>Created By</th>
					<th>Created Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($result = mysqli_query($conn, "select c.id,c.comments,u.name,c.createddate from comments c inner join user u
					on c.createdbyid = u.id")) {
					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_array($result)) {
							echo "<tr>
									<td>".$row['comments']."</td>
									<td>".$row['name']."</td>
									<td>".$row['createddate']."</td>
									<td><button id='delete' class='btn btn-default' onclick='deleteComment(".$row['id'].");'>Delete</a> &nbsp <button id='update' class='btn btn-default' onclick='updateComment(".$row['id'].");'>Update</a></td>
								</tr>";
						}
					} else {
						echo "<tr><td>No comments yet</td></tr>"; 
					}
				}
				?>
			</tbody>
		</table>
		

	</div>


	
</body>
</html>

<script type="text/javascript">
	function clickAdd() {
		var comment = $("#comment").val();
		var nameid = $("#nameid").val();
		$.ajax({
         url: 'add.php?comment='+comment+'&nameid='+nameid,
         type: 'post',
         success: function(response){
         	alert("Successfully added the comment!");
         	location.reload();
         }
       });
	}

	function deleteComment(commentid) {
		con = confirm("Are you sure to delete the comment?");
		if(con == true){
			$.ajax({
	         url: 'delete.php?commentid='+commentid,
	         type: 'post',
	         success: function(response){
	         	alert("Successfully deleted the comment!");
	         	location.reload();
	         }
	       });	
		}
	}

	function updateComment(commentid) {
		var comment = $("#comment").val();
		if(comment == ""){
			alert("Please fill-up the comment form to update!");
		} else {
			$.ajax({
	         url: 'update.php?commentid='+commentid+'&comment='+comment,
	         type: 'post',
	         success: function(response){
	         	alert("Successfully updated the comment!");
	         	location.reload();
	         }
	       });	
		}
	}
  
</script>