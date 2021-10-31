<?php
session_start();
require_once('connection.php');
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
	<form class="form-inline">
	<input type="name" name="team_name" placeholder="Enter your student Id"><br>
		<br>
		<input type="submit" name="submit">
	</form>
	<!-- This is a comment for left table -->
    <h3>Project Team</h3>
	<form class="form-inline" action="dashboard.php" method="POST">
		
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
		
		<input type="name" name="your_id" placeholder="Your student number"><br>
		<input type="name" name="partnet_id" placeholder="Partner student number"><br>
		<input type="name" name="team_name" placeholder="Team Name"><br>
		<br>
		<input type="submit" name="submit">
	</form>
	<h4>Project Idea: Approved</h4>
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
    <div class="fakeimg" style="height:200px;">
	<!-- This is a comment for column -->
	<div class="row">
		<div class="column">
			<div class="custom-select" style="width:200px;">
				<select>
					<option value="0">Select idea:</option>
					<option value="1">Online Shopping</option>
					<option value="2">Logistic</option>
				</select>
			</div>
		
		</div>
		<div class="column">
			<form class="form-inline">
				<textarea  name="project_description" placeholder="Project Description" rows="8" cols="70"></textarea>
				<br>
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
	<!-- This is a comment for column -->
	</div>   

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