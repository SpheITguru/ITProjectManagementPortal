<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>IT Project Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="header">
  <h1>Welcome to IT Project Portal</h1>
  <p>This is Student dashboard</p>
</div>

<div class="navbar">
  <a href="logout.php" class="right">Logout</a>
</div>

<div class="row">
  <div class="side">
    <h2>Welcome <?php echo $_SESSION['fname']; ?></h2>
    <h5><?php echo $_SESSION['email']; ?></h5>
	<!-- This is a comment for left table -->
    <div class="fakeimg" style="height:250px;">
		<table>
			<tr>
				<th>Profile</th>
			</tr>
			<tr>
				<td><?php echo $_SESSION['fname']; ?></td>
			</tr>
			<tr>
				<td><?php echo $_SESSION['lname']; ?></td>
			</tr>
			<tr>
				<td><?php echo $_SESSION['email']; ?></td>
			</tr>
		</table>
	
	</div>
	<!-- This is a comment for left table -->
    <h3>Project Team</h3>
	<form class="form-inline" action="dashboard.php method="POST">	
							
							
		<?php
		require_once('connection.php');


			if(isset($_POST['submit']))
			{
				$ystudent = mysqli_real_escape_string($con, $_POST['your_id']);
				$pstudent = mysqli_real_escape_string($con, $_POST['partner_id']);
				$tname = mysqli_real_escape_string($con, $_POST['team_name']);
				
				$sql = "insert into team (tname,ystudent_id,pstudent_id) values ('$tname', '$ystudent', '$pstudent')";
				$result = mysqli_query($con, $sql);
				

				if($result)
				{
					echo 'Your Record has been saved in the Database';
				}
				else 
				{
					echo 'Check your inputs';
				}
			 }

		?>
							
							
		<input type="text" name="team_name*" placeholder="Team Name">
		<input type="text" name="your_id" placeholder="Your student number" required><br>
		<input type="text" name="partnet_id" placeholder="Partner student number" required><br>
		<input type="text" name="team_name" placeholder="Team Name" required><br>
		<br>
		<input type="submit" name="submit">
	</form>
	<h4>Project Name</h4>
    <form class="form-inline">
		<input type="name" name="project_name" placeholder="Project Name"><br><br>
		<textarea  name="project_description" placeholder="Project Description" rows="4" cols="23"></textarea>
		<br>
		<input type="submit" name="submit">
	</form>
  </div>
  <div class="main">
    <h2>Search an Idea</h2>
    <h5>Oct , 2020</h5>
    <div class="fakeimg" style="height:200px;">search idea</div>   

    <h2>SUBMISSION</h2>

		<form class="form-inline" action="/action_page.php">
			<label for="email">Tusk Name:</label>
			<input type="name" id="email" placeholder="Tusk Name" name="tusk_name">
			<input type="file" id="myFile" name="filename">
			<button type="submit">Submit</button>
		</form>

    <h5>Oct , 2020</h5>
	<!-- This is a comment for left table -->
    <div class="fakeimg" style="height:270px;">
		<table>
			<tr>
				<th>Tusk Name</th>
				<th>Sponsor signiture</th>
				<th>Lecture feedback</th>
				<th>Document</th>
			</tr>
			<tr>
				<td>Use Case</td>
				<td>Approved</td>
				<td>accept</td>
				<td>file</td>
			</tr>
			<tr>
				<td>Requirements</td>
				<td>Approved</td>
				<td>redo</td>
				<td>file</td>
			</tr>
			<tr>
				<td>Prototype</td>
				<td>Panding</td>
				<td>Panding</td>
				<td>file</td>
			</tr>
		</table>
	
	</div>
	<!-- This is a comment for left table -->
	
	</div>
    
  </div>
</div>

<div class="footer">
  <h2></h2>
</div>

</body>
</html>
