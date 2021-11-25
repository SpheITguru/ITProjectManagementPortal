<?php

session_start();
//include "db_conn.php";
require_once('connection.php');
?>
<?php

require_once('connection.php');

if(isset($_POST['submit_idea']))
{
	$idea = mysqli_real_escape_string($con, $_POST['your_id']);
	$idea_description = mysqli_real_escape_string($con, $_POST['project_description']);
	$sql = "insert into ideas (new_idea,idea_info,sponsor) values ('$idea', '$idea_description', '" . $_SESSION['email'] . "' )";
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

	<?php 
	$email = $_SESSION['email'];
	$select = mysqli_query($con," SELECT * FROM team WHERE sponsor = '$email' ");
	$row  = mysqli_fetch_array($select);

	if(is_array($row)) {
		$student1 = $row['student_1'];
		$student2 = $row['student_2'];
		$tname = $row['tname'];
	}

	$select_user1 = mysqli_query($con," SELECT * FROM user WHERE ystudent = '$student1' ");
	$row_user1  = mysqli_fetch_array($select_user1);

	if(is_array($row_user1)) {
		$student_name1 = $row_user1['fname'];
		$student_lname1 = $row_user1['lname'];
	}

	$select_user2 = mysqli_query($con," SELECT * FROM user WHERE ystudent = '$student1' ");
	$row_user2  = mysqli_fetch_array($select_user2);

	if(is_array($row_user2)) {
		$student_name2 = $row_user2['fname'];
		$student_lname2 = $row_user2['lname'];
	}
	?>
    <h3>Project Team <?php echo $tname; ?></h3>
	<table>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Student ID</th>
			</tr>
			<tr>
				<td><?php echo $student_name1;?></td>
				<td><?php echo $student_lname1;?></td>
				<td><?php echo $student1;?></td>
			</tr>
			<tr>
				<td><?php echo $student_name2;?></td>
				<td><?php echo $student_lname2;?></td>
				<td><?php echo $student2;?></td>
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
			<form class="form-inline" method="POST">
			<input type="name" name="your_id" placeholder="<?php echo $_SESSION['idea']; ?>">		
		</div>
		<div class="column">
			
				<textarea  name="project_description" placeholder="<?php echo $_SESSION['idea_info']; ?>" rows="8" cols="70"></textarea>
				<br>
				<?php 
				if (empty($_SESSION['idea'])) {
				?>
				<input type="submit" name="submit_idea">
				<?php
				}
				?>
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
