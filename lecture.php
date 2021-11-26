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
<link rel="stylesheet" href="css/lecture.css">
</head>
<body>

<div class="header">
  <h1>Welcome to IT Project Portal</h1>
  <p>This is Lecture dashboard</p>
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
	<br>
	<div class="custom-select" style="width:200px;">
		
	</div>
	<!-- This is a comment for left table -->

	<?php 
	$email = $_SESSION['email'];
	$select = mysqli_query($con," SELECT * FROM team WHERE sponsor = '$email' ");
	$row  = mysqli_fetch_array($select);

	$student1 = "";
	$student2 = "";
	$tname = "";

	if(is_array($row)) {
		$student1 = $row['student_1'];
		$student2 = $row['student_2'];
		$tname = $row['tname'];
	}
 
	$select_user1 = mysqli_query($con," SELECT * FROM users WHERE ystudent = '$student1' ");
	$row_user1  = mysqli_fetch_array($select_user1);


	$student_name1 = "";
	$student_lname1 = "";

	if(is_array($row_user1)) {
		$student_name1 = $row_user1['fname'];
		$student_lname1 = $row_user1['lname'];
	}

	$select_user2 = mysqli_query($con," SELECT * FROM users WHERE ystudent = '$student2' ");
	$row_user2  = mysqli_fetch_array($select_user2);


	$student_name2 = "";
	$student_lname2 = "";

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
    <h2>Search an Idea</h2>
    <h5>Nov , 2021, <?php echo "Today is " . date("l");?></h5>
    <div class="fakeimg" style="height:200px;">
	<!-- This is a comment for column -->
	<?php

			$select_idea = mysqli_query($con,"SELECT * FROM `ideas` WHERE approved_idea is not NULL");
			$row_idea  = mysqli_fetch_array($select_idea);
		
	?>
	<div class="row">
		<form>
		<div class="column">
		<table>
			<?php
			if(is_array($row_idea)) {
				
			?>
		<tr>
			<th><?php echo $row_idea['new_idea']; ?></th>
		</tr>
		
		</table>
		
		</div>
			<div class="column">				
				<textarea  name="project_description" placeholder="Project Description" rows="8" cols="70"><?php echo $row_idea['idea_info']; ?></textarea>	
				<br>
				<input type="submit" name="submit">
			</div>
			<?php
				}
			?>
		</form>
	</div>
	<!-- This is a comment for column -->
	</div>   

    <br>

    <h5>Nov , 2021, <?php echo "Today is " . date("l");?></h5>
	<!-- This is a comment for left table -->
    <div class="fakeimg" style="height:270px;">
		<table>
			<tr>
				<th>Task Name</th>
				<th>Sponsor signiture</th>
				<th>Lecture feedback</th>
			</tr>
			<tr>
				<td>Use Case</td>
				<td>Approved</td>
				<td></td>
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
