<?php
	session_start();

	require_once('../model/travelApprovalModel.php');

	if(!isset($_SESSION['flag'])){
		header('location: ../../view/signin.php');
	}

	if(isset($_POST['save_btn'])){

		$user = [	
					'empname'=>$_POST['empname'], 
					'leavetype'=>$_POST['leavetype'],
					'days'=>$_POST['days'],
					'contract'=> $_POST['contract'],
					'statedate'=> $_POST['statedate'],
					'enddate'=>$_POST['enddate'],
					'reason'=>$_POST['reason'],
					'status'=>$_POST['status']
				];
					
		 $status = TravelRequestInsertData($user);

		if($status){
			?>
				<script type="text/javascript">
					alert('Inserted data in database');
				</script>
			<?php

			header('location: travel_approval.php');

		}else{
	
			?>
				<script type="text/javascript">
					alert('Error database connection');
				</script>
			<?php
		}
	}
?>

<!-- ================================================================ -->

<?php 
	$title= "Travel Request";
	include('header.html');
?>
</head>
<body>
	
	<table border="1px" align="center" width="100%">
		<tr>	
			<td>
				<table width="100%">
					<tr>
						<td width="150px" height="50px">
							<img src="../asset/company_logo.png" alt="main_logo" width="100%" height="100%">
						</td>
						<td align="right" >Logged in as
							<a href="../controler/view_profile_check.php">
								<?php
									echo $_SESSION['current_user']['name'];
								?>
							</a> |
							<a href="../../controller/logout.php">Logout</a> 
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<!-- new table creating -->
	<table  border="1px" align="cen" width="100%">
		<tr>
			<td width="200px" height="425px"><h2>Main Menu</h2>
				<hr>

				<details>
					<summary><b>Dashboard</b></summary>
						<details>
							<summary><a href="dashboard.php">Dashboard</a></summary>	
						</details>
				</details>

				<details>
					<summary><b>Portal</b></summary>
						<details>
							<summary><a href="create_leave_request.php">Create Leave Request</a></summary>
						</details>
						<details>
							<summary><a href="create_travel_request.php">Create Travel Request</a></summary>
						</details>
						<details>
							<summary><a href="fixing_interview_approval.php">Fixing Interview</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Screening & Approval</b></summary>
						<details>
							<summary><a href="leave_approval.php">Leave Approval</a></summary>
						</details>
						<details>
							<summary><a href="travel_approval.php">Travel Approval</a></summary>
						</details>
						<details>
							<summary><a href="fixing_interview_approval.php">Search Employee</a></summary>
						</details>
						<details>
							<summary><a href="performance_approval.php">Performance Overview</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Requirement</b></summary>
						<details>
							<summary><a href="add_job.php">Add Job Titles</a></summary>
						</details>
						<details>
							<summary><a href="view_job.php">View Job Titles</a></summary>
						</details>
						<details>
							<summary><a href="add_job_vacancy.php">Add Job Vacancy</a></summary>
						</details>
						<details>
							<summary><a href="view_job_vacancy.php">View Job Vacancy</a></summary>
						</details>
						<details>
							<summary><a href="online_app.php">Online Application</a></summary>
						</details>
						<details>
							<summary><a href="fixing_interview.php">Fixing Interview Online</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Setting</b></summary>
						<details>
							<summary><a href="../controler/view_profile_check.php">View Profile</a></summary>
						</details>
						<details>
							<summary><a href="../controler/edit_profile_check.php">Edit Profile</a></summary>
						</details>
						<details>
							<summary><a href="../controler/change_pass_check.php">Change Password</a></summary>
						</details>
						<details>
							<summary><a href="../../controller/logout.php">Logout</a></summary>
						</details>
				</details>	

			</td>
			<td colspan="2" align="center">
				<table align="center">
					<tr>
						<td>
							<form method="post" action="create_travel_request.php">
								<fieldset>
									<h2>Create Travel Request</h2>
									<hr>
								
									<table align="center">
										<tr>
											<td>Employee Name</td>
											<td>:
												<input type="text" name="empname" value="">
											</td>
										</tr>
										<tr>
											<td>Contract During Leave</td>
											<td>:
												<input type="text" name="contract" value="">
											</td>
										</tr>
										<tr>
											<td>Leave Type</td>
											<td>:
												<input type="text" name="leavetype" value="">
											</td>
										</tr>
										<tr>
											<td>Number Of Days</td>
											<td>:
												<input type="number" name="days" value="">
											</td>
										</tr>
										<tr>
											<td>State Date</td>
											<td>:
												<input type="date" name="statedate" value="">
												</select>
											</td>
										</tr>
										<tr>
											<td>End Date</td>
											<td>:
												<input type="date" name="enddate" value="">
												</select>
											</td>
										</tr>
										<tr>
											<td>Reason for Leave</td>
											<td>:
												<input type="text" name="reason" value="">
											</td>
										</tr>
										<tr>
											<td>Status for Leave</td>
											<td>:
												<input type="text" name="status" value="">
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left">
												<hr>
												<input type="submit" name="save_btn" value="Save">
											</td>
										</tr>
									</table>
								</fieldset>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php 
	include('footer.html'); 
?>