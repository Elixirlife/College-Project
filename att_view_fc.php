<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_faculty_session()){
		header('Location: facultylogin.php');
		exit();
	}
?>	
<?php 
$pageTitle = "All student details";
include "php/headertop.php";
?>
<div class="all_student fix">
	<h3 style="text-align:center;color:#000000;margin:0;padding:5px;background:#ffffff">View Attendance</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:right;"> <button style="background:#7974fc;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="class_att_fc.php">Take Attendance</a></button></span>
		</div>

		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center; background:#7974fc">SL</th>
				<th style="text-align:center; background:#7974fc"> Attendance Date</th>
				<th style="text-align:center; background:#7974fc">Action</th>
				
				
			</tr>
			<?php 
			$i=0;
				$get_date = $user->get_attn_date();
				
				while($rows = $get_date->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['at_date'];?></td>
				<td><a href="att_single_view_fc.php?dt=<?php echo $rows['at_date']; ?>">View Attendance</a></td>
				
			</tr>
			<?php } ?>
			
		</table>
</div>

<?php ob_end_flush() ; ?>