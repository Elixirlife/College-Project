<?php
	ob_start ();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	
?>
<?php 
$pageTitle = "All Faculty details";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>All Registered Faculty List</h3></div>

	</div>

		<table class="tab_one">
			<tr>
				<th style="background:#4b74fa;">SL</th>
				<th  style="background:#4b74fa;">Name</th>
				<th  style="background:#4b74fa;">Email</th>
				<th  style="background:#4b74fa;">Contact</th>
				<th  style="background:#4b74fa;">Education</th>
				<th  style="background:#4b74fa;">Address</th>
				<th style="background:#4b74fa;">Birthday</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser =$user->get_faculty();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['contact'];?></td>
				<td><?php echo $rows['education'];?></td>
				<td><?php echo $rows['address'];?></td>
				<td><?php echo $rows['birthday'];?></td>
				
			</tr>
			<?php } ?>
		</table>
</div>
<!-- <?php include "php/footerbottom.php";?> -->
<?php ob_end_flush() ; ?>