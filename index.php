<!DOCTYPE html>
<html>
<head>
	<title>PHP Starter Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
	<script>
		var visibilities = ["block", "none"];

		function toggleexpander(ele) {
			var index = ele.nextElementSibling.style.display == "block" ? 1 : 0;
			ele.nextElementSibling.style.display = visibilities[index];
			ele.children[index].style.display = "block";
			ele.children[1 - index].style.display = "none";
		}
	</script>
</head>
<body>
	 <div class='expander'><div class='expanderribbon' onclick='toggleexpander(this)' style='background: #de214c'> Insert Records <span style='float: right; display: none'>⊓</span><span style='float: right;'>⊔</span></div><div class='expanderdata' >
	 	<form action="index.php" method="post" >
		 	<input type='text' placeholder='USN' name='usn'> </input><br/>
			<input type='text' placeholder='name' name='name'> </input><br/>
			<input type='submit' name='op' value='Insert'> </input>
			<pre>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op']=='Insert') {
					include 'db.php';
					if(mysqli_query($con, "insert into StudentRecords values ('".$_POST["usn"]."', '".$_POST["name"]."');")) {
						echo "<br/>Record inserted.</br>";
					}
					echo "<script>toggleexpander(document.currentScript.parentNode.parentNode.parentNode.previousSibling)</script>";
				}
			?>
			</pre>
		</form>
		
	</div></div>
	<div class='expander'><div class='expanderribbon' onclick='toggleexpander(this)' style='background: #d35400'> Update Records <span style='float: right; display: none'>⊓</span><span style='float: right;'>⊔</span></div><div class='expanderdata' >
		<form action="index.php" method="post" >
			<input type='text' placeholder='USN' name='usn'> </input><br/>
			<input type='text' placeholder='name' name='name'> </input><br/>
			<input type='submit' name='op' value='Update'> </input>
			<pre>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == 'Update') {
					include 'db.php';
					if(mysqli_query($con, "update StudentRecords set name='".$_POST["name"]."' where usn='".$_POST["usn"]."'")) {
						echo "<br/>Record updated.</br>";
					}
					echo "<script>toggleexpander(document.currentScript.parentNode.parentNode.parentNode.previousSibling)</script>";
				}
			?>
			</pre>
		</form>
	</div></div>
	<div class='expander'><div class='expanderribbon' onclick='toggleexpander(this)' style='background: #138d75'> Delete Records <span style='float: right; display: none'>⊓</span><span style='float: right;'>⊔</span></div><div class='expanderdata' >
		<form action="index.php" method="post" >
			<input type='text' placeholder='USN' name='usn'> </input><br/>
			<input type='submit' name='op' value='Delete'> </input>
			<pre>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == 'Delete') {
					include 'db.php';
					if(mysqli_query($con, "delete from StudentRecords where usn='".$_POST["usn"]."'")) {
						echo "<br/>Record deleted.</br>";
					}
					echo "<script>toggleexpander(document.currentScript.parentNode.parentNode.parentNode.previousSibling)</script>";
				}
			?>
			</pre>
		</form>
		
	</div></div>
	<div class='expander'><div class='expanderribbon' onclick='toggleexpander(this)' style='background: #2c3e50'> Search Records <span style='float: right; display: none'>⊓</span><span style='float: right;'>⊔</span></div><div class='expanderdata' >
		<form action="index.php" method="post" >
			<input type='text' placeholder='USN' name='usn'> </input><br/>
			<input type='submit' name='op' value='Search'> </input>
			<table>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == "Search") {
					include 'db.php';
					$res = mysqli_query($con, "select * from StudentRecords where usn='".$_POST['usn']."' or name='".$_POST['usn']."';");
					while(($row = $res->fetch_assoc())) {
						echo "<tr><td>".$row["usn"]."</td><td>".$row["name"]."</td></tr>";
					}
					
				}
			?>
			</table>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == "Search") {
					echo "<script>toggleexpander(document.currentScript.parentNode.parentNode.previousSibling)</script>";
				}
			?>
		</form>
	</div></div>
	<div class='expander'><div class='expanderribbon' onclick='toggleexpander(this)' style='background: #3498db'> All Records <span style='float: right; display: none'>⊓</span><span style='float: right;'>⊔</span></div><div class='expanderdata' >
		<form action="index.php" method="post" >
			<input type='submit' name='op' value='View All'> </input>
			<table>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == "View All") {
					include 'db.php';
					$res = mysqli_query($con, "select * from StudentRecords;");
					while(($row = $res->fetch_assoc())) {
						echo "<tr><td>".$row["usn"]."</td><td>".$row["name"]."</td></tr>";
					}
				}
			?>
			</table>
			<?php 
				if(ISSET($_POST['op']) && $_POST['op'] == "Search") {
					echo "<script>toggleexpander(document.currentScript.parentNode.parentNode.previousSibling)</script>";
				}
			?>
		</form>
	</div></div>
</body>
</html>
