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
		<h3 style="text-align:center;color:#000000;margin:0;padding:5px;background:#ffffff"> Take Attendance</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="text-align:center;"><a style="color:#fff;" href="att_view_fc.php"> <button style="background:#7974fc;border:none;color:#fff;padding:10px;margin-left:585px">View Attendance</button></a></span>
		</div>
		<?php
			if(isset($_REQUEST['res'])){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Data deleted successfully !</h3>";
			}
		?>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$cur_date = $_POST['attndate'];
				$atten = $_POST['attn'];
				$res = $user->insertattn($cur_date,$atten);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Attendance data successfully inserted!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Failed to insert data</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
		<p style="text-align:center;color:#34495e;">
			Select date: <input type="date" name="attndate" required/>
		</p>
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center; background:#7974fc">SL</th>
				<th style="text-align:center;background:#7974fc">Name</th>
				<th style="text-align:center;background:#7974fc">ID</th>
				<th style="text-align:center;background:#7974fc">Attendance</th>
	
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->attn_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" checked/>Absent</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" />Present</label>
				</td>
			</tr>
			<?php } ?>
	
		</table>
		<br>
		
		
		<span style="margin-left:565px;"><input style="<text-align:center></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" /></span>
	
	</form>
		

		
</div>

<?php ob_end_flush() ; ?>