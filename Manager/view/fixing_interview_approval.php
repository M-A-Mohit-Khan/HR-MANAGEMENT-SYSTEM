<?php
	session_start();

	if(!isset($_SESSION['flag'])){
		header('location: ../../view/signin.php');
	}
?>

<!-- ================================================================ -->

<?php 
	$title= "Fixing Approval";
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
				<table border="1px" align="center" cellspacing="5" cellpadding="5">
					<tr>
						<td align="center" colspan="11">
							<h2>Fixing Interview Approval</h2>
						</td>
					</tr>
					<tr>
						<th>SL</th>
						<th>Candidate</th>
						<th>Vacancy</th>
						<th>Time</th>
						<th>Date</th>
						<th>Status</th>
						<th>Comment</th>
						<th colspan="2">ACTION</th>
					</tr>

					<?php
						require_once('../model/fixingInterviewModel.php');

						$result = FixingInterviewAllData();

						//print_r($result);

						if(count($result)>0){
							foreach ($result as $key => $value) {
								echo "
									<tr>
										<td>{$value['id']}</td>
										<td>{$value['candidate']}</td>
										<td>{$value['vacancy']}</td>
										<td>{$value['time']}</td>
										<td>{$value['date']}</td>
										<td>{$value['status']}</td>
										<td>{$value['comment']}</td>
										<td>
											<a href='../controler/fixing_interview_edit.php?id=$value[id]'>Update</a>
										</td>
										<td>
											<a href='../controler/fixing_interview_approval_delete.php?id=$value[id]'>Delete</a>
										</td>
									</tr>
								";
							}
						}
					?>
					
				</table>
			</td>
		</tr>
<?php 
	include('footer.html'); 
?>