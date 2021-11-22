<?php

session_start();
//include "db_conn.php";
require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>IT Project Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/sponsor.css">
</head>
<body>

<div class="header">
  <h1>Welcome to IT Project Portal</h1>
  <p>This is Sponsor dashboard</p>
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
				<td>Name: <?php echo $_SESSION['fname']; ?></td>
			</tr>
			<tr>
				<td>Surname: <?php echo $_SESSION['lname']; ?></td>
			</tr>
		</table>
	
	</div>
	<!-- This is a comment for left table -->
    <h3>Project Team LION</h3>
	<table>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Student ID</th>
			</tr>
			<tr>
				<td>Siphephelo</td>
				<td>Mlungwana</td>
				<td>21958988</td>
			</tr>
			<tr>
				<td>Katleo</td>
				<td>Rantle</td>
				<td>21959243</td>
			</tr>
		</table>
  </div>
  <div class="main">
    <h2>Add an Idea</h2>
    <h5>Nov , 2021, <?php echo "Today is " . date("l");?></h5>
    <div class="fakeimg" style="height:200px;">
	
	<!-- This is a comment for column -->
	<div class="row">
		<div class="column">
			<form class="form-inline">
			<input type="name" name="your_id" placeholder="Add Idea">		
		</div>
		<div class="column">
			
				<textarea  name="project_description" placeholder="Project Description" rows="8" cols="70"></textarea>
				<br>
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
	<!-- This is a comment for column -->
	
	</div>   

    <h2>SUBMISSION</h2>
	<!-- This is a comment for left table -->
    <div class="fakeimg" style="height:270px;">
		<table>
			<tr>
				<th>Task Name</th>
				<th>Sponsor signiture</th>
				<th>Lecture feedback</th>
				<th>Document</th>
			</tr>
			<tr>
				<td>Use Case</td>
				<td><form>
						<input type="radio" id="student" name="users"><label for="student">Approve</label>
						<input type="radio" id="student" name="users"><label for="student">Disapprove</label>
						<input type="submit" name="submit">
					</form>
				</td>
				<td>accept</td>
				<td><a href="#">Use Case</a></td>
			</tr>
			<tr>
				<td>Requirements</td>
				<td><form>
						<input type="radio" id="student" name="users"><label for="student">Approve</label>
						<input type="radio" id="student" name="users"><label for="student">Disapprove</label>
						<input type="submit" name="submit">
					</form>
				</td>
				<td>redo</td>
				<td><a href="#">Requirements</a></td>
			</tr>
			<tr>
				<td>Prototype</td>
				<td><form>
						<input type="radio" id="student" name="users"><label for="student">Approve</label>
						<input type="radio" id="student" name="users"><label for="student">Disapprove</label>
						<input type="submit" name="submit">
					</form>
				</td>
				<td>Panding</td>
				<td><a href="#">Prototype</a></td>
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
