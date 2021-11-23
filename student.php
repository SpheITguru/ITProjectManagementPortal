<?php
session_start();
require_once('connection.php');

?>


<?php
		require_once('connection.php');
		
        if (isset($_POST['submit_id'])){
			$studentID = mysqli_real_escape_string($con, $_POST['your_studentID']);
			$sql = "UPDATE users SET ystudent = '" . $studentID . "' WHERE fname = '" . $_SESSION['fname'] . "' AND email = '" . $_SESSION['email'] . "'";
			echo $sql;
			$result = mysqli_query($con, $sql);
			
				if($result)
				{
					echo 'Your Record has been saved in the Database';
					$_SESSION["student"] = $studentID;
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
<link rel="stylesheet" href="css/student.css">
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
				<td>Name: <?php echo $_SESSION['fname']; ?></td>
			</tr>
			<tr>
				<td>Surname: <?php echo $_SESSION['lname']; ?></td>
			</tr>
			<tr>
				<td>Student ID: <?php echo $_SESSION['student']; ?></td>
			</tr>
		</table>
	
	</div>
	<?php 
	if (empty($_SESSION['student'])) {
	?>
	<form class="form-inline" method="POST">
	
	<input type="text" name="your_studentID" placeholder="Enter your student Id"><br>
		<br>
		<input type="submit" name="submit_id">
	</form>
	<?php 
	}
	?>
	<!-- This is a comment for left table -->
    <h3>Project Members</h3>
	<form class="form-inline" method="POST">
		
		<?php
			require_once('connection.php');						     
		
			if(isset($_POST['submit_team']))
			{
				$ystudent = mysqli_real_escape_string($con, $_POST['student_1']);
				$pstudent = mysqli_real_escape_string($con, $_POST['student_2']);
				$tname = mysqli_real_escape_string($con, $_POST['team_name']);
								
				$sql = "insert into team (tname,student_1,student_2) values ('$tname', '$ystudent', '$pstudent')";
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
		
		<input type="text" name="student_1" placeholder="Your student number"><br>
		<input type="text" name="student_2" placeholder="Partner student number"><br>
		<input type="text" name="team_name" placeholder="Team Name"><br>
		<br>
		<input type="submit" name="submit_team">
	</form>
	<br>
  </div>
  <div class="main">
    <h2>Search an Idea</h2>
    <h5>Nov , 2021, <?php echo "Today is " . date("l");?></h5>
    <div class="fakeimg" style="height:200px;">
	<!-- This is a comment for column -->
	<div class="row">
	<form class="form-inline" method="POST">
		<table>
			<tr>
				<th>Choose</th>
				<th>Idea name</th>
				<th>Idea Description</th>
			</tr>
			<?php
			//$select_idea = mysqli_query($con,"SELECT * FROM `ideas` WHERE approved_idea is not NULL");
            //$row_idea  = mysqli_fetch_array($select_idea);
			//$num=mysql_numrows($select_idea);
			//echo "test";
			//echo $num;	
			
			$select_idea = mysqli_query($con,"SELECT * FROM `ideas` WHERE approved_idea is not NULL");
			$result = mysqli_query($select_idea);
			$row = mysqli_fetch_assoc($result);
			//$id = $row['id'];
			$num=mysqli_numrows($result);
			//echo "test";
			//echo $num;
			//if(false) {
			
				?>
				<tr>
					<td><input type="radio" id="student" name="users"></td>
					<td>grass cut</td>
					<td>cutting grass</td>
				</tr>
				<?php
					//}
				?>
		</table>
		<button type="submit" name="submit_idea">Submit</button>
		</form>
	</div>
	<!-- This is a comment for column -->
	</div>   

    <h2>SUBMISSION</h2>

		<form class="form-inline" action="/action_page.php">
			<label for="email">Task Name:</label>
			<input type="name" id="email" placeholder="Task Name" name="task_name">
			<input type="file" id="myFile" name="filename">
			<button type="submit">Submit</button>
		</form>

    <h5>Nov , 2021, <?php echo "Today is " . date("l");?></h5>
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
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>
