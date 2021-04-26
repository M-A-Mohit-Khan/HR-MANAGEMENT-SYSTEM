<?php
	session_start();
	if(isset($_SESSION['flag']))
	{
	require_once('../model/dbConnection.php');
	require_once('../model/userModel.php');
	

	//$id = $_GET['id'];
	$userid = $_SESSION['userId'];
	$connection = getConnection();
	$selectedUser = getloginbyId($userid);
	//$_SESSION['id'] = $id;
	//$gender=$selectedUser['gender'];
	if(isset($_GET['userid']))
	{
	$useridfound = $_GET['userid'];
	//$connection = getConnection();
	$editUser = getloginbyemployeeId($useridfound);
	//$_SESSION['id'] = $id;
	$gender=$editUser['gender'];
	$status=$editUser['status'];
	}
	else
	{
		$useridfound="";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>

	<script type="text/javascript" src="script4.js"></script>
</head>

<body>
    <header>

    <table width="100%" cellspacing="0">

		<tr>
			<td align="right">
			<a href="dashBoard.php"><?php echo $selectedUser['name']?></a> 
				&nbsp
                <a href="../../controller/logout.php">Logout</a> 
				&nbsp
			</td>
		</tr>

	</table>

    </header>

    <nav>
    
    <table width="100%" cellspacing="0" border="1">
		<tr>
			<td width="33%">
                DashBoard
                <br>
                <br>
                <details>
                    <summary>
                    Profile
                    </summary>
                    <a href="userProfile.php">User Profile</a><br>
                    <a href="editProfile.php">Edit Profile</a><br>
                    <a href="changePassword.php">Change Password</a><br>
                    
                </details>

                <details>
                    <summary>
                    Add Users
                    </summary>
                    <a href="addManagement.php">Management</a><br>
                    <a href="addEmployee.php">Employee</a><br>
                    <a href="addboardofDirector.php">Board of Director</a><br>
                </details>

                <details>
                    <summary>
                    Verify Users
                    </summary>
                    <a href="verifyManagement.php">Management</a><br>
                    <a href="verifyEmployee.php">Employee</a><br>
                    <a href="verifyboardofDirector.php">Board of Director</a><br>
                </details>

                <details>
                    <summary>
                    Manipulate Users
                    </summary>
                    <a href="manipuManagement.php">Management</a><br>
                    <a href="manipuEmployee.php">Employee</a><br>
                    <a href="manipuboardofDirector.php">Board of Director</a><br>
                </details>

                <details>
                    <summary>
                    News
                    </summary>
                    <a href="news.php">News</a><br>
                    
                </details>

                <details>
                    <summary>
                    Notifications
                    </summary>
                    <a href="notification.php">Notification</a><br>
                    <a href="helpseekingNotification.php">Help Seeking Notification</a><br>
                    
                </details>

			</td>

			<td width="33%">
			<center>
                
                <h1 id="myh1"></h1>
				<input type="text" name="name" id="name" onkeyup="ajax()" />
				<input type="submit" name="search" value="Search By Name">

				<div id="result">
              
				</div>

                </center>
			</td>

            <td width="33%">
			<center>
                <form method="POST" action="../controller/maniemployeeCheck.php">
                <fieldset style="width: 33%">
                
				<?php
				if($useridfound)
				{
					
				?>
				<?php //echo $useridfound; ?>
                <table width="100%">
					<tr>
					<td colspan="2">
						Name :
					</td>

					<td>
						<input type="name" name="name" value="<?php echo $editUser['name']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						User Id :
					</td>
            
					<td>
						<input type="text" name="userId" value="<?php echo $editUser['userid']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Email :
					</td>
					<td>
						<input type="email" name="email" value="<?php echo $editUser['email']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Password :
					</td>
                    
					<td>
						<input type="password" name="password" value="<?php echo $editUser['password']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Confirm Password :
					</td>
                    
					<td>
						<input type="password" name="cPassword" value="<?php echo $editUser['password']?>">
					</td>
				</tr>
				

				<tr>
					<td>
						Gender :
					</td>
					<td colspan="3">
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male")  echo "checked";?> value="Male"> Male
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female")  echo "checked";?> value="Female"> Female
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other")  echo "checked";?> value="Other"> Other
					</td>
				</tr>
                <tr>
					<td colspan="2">
						DOB :
					</td>
					<td colspan="2">
                    <input type="date" id="dob" name="dob"  value="<?php echo $editUser['dob']?>">
					</td>
				</tr>

                <tr>
					<td colspan="2">
						Address :
					</td>
					<td colspan="2">
                    <input type="text" name="address"  value="<?php echo $editUser['address']?>">
					</td>
				</tr>

				<tr>
					<td>
						Status :
					</td>
					<td colspan="3">
					<input type="radio" name="status" <?php if (isset($status) && $status=="active")  echo "checked";?> value="active"> Active
					<input type="radio" name="status" <?php if (isset($status) && $status=="inactive")  echo "checked";?> value="inactive"> Inactive
					
					</td>
				</tr>

				<tr>
					<td colspan="3"> <hr> </td>
				</tr>

				<tr>
					<td>
						<input type="submit" name="edit" value="edit">
                    
                    </td>
					<td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    <td colspan="2">
                   
					</td>
				</tr>
				

            </table>
			
			<?php

				}else{
					?>
					<table width="100%">
					<tr>
					<td colspan="2">
						Name :
					</td>

					<td>
						<input type="name" name="name" value="<?php //echo $selectedUser['name']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						User Id :
					</td>
            
					<td>
						<input type="text" name="userId" value="<?php //echo $selectedUser['userid']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Email :
					</td>
					<td>
						<input type="email" name="email" value="<?php //echo $selectedUser['email']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Password :
					</td>
                    
					<td>
						<input type="password" name="password" value="<?php //echo $selectedUser['password']?>">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Confirm Password :
					</td>
                    
					<td>
						<input type="password" name="cPassword" value="<?php //echo $selectedUser['password']?>">
					</td>
				</tr>
				

				<tr>
					<td>
						Gender :
					</td>
					<td colspan="3">
					<input type="radio" name="gender" <?php //if (isset($gender) && $gender=="Male")  echo "checked";?> value="Male"> Male
					<input type="radio" name="gender" <?php  //echo "checked";?> value="Female"> Female
					<input type="radio" name="gender" <?php  //echo "checked";?> value="Other"> Other
					</td>
				</tr>
                <tr>
					<td colspan="2">
						DOB :
					</td>
					<td colspan="2">
                    <input type="date" id="dob" name="dob"  value="<?php //echo $selectedUser['dob']?>">
					</td>
				</tr>

                <tr>
					<td colspan="2">
						Address :
					</td>
					<td colspan="2">
                    <input type="text" name="address"  value="<?php //echo $selectedUser['address']?>">
					</td>
				</tr>

				<tr>
					<td>
						Status :
					</td>
					<td colspan="3">
					<input type="radio" name="status"/ value="active"> Active
					<input type="radio" name="status"/ value="inactive"> Inactive
					
					</td>
				</tr>

				<tr>
					<td colspan="3"> <hr> </td>
				</tr>

				<tr>
					<td>
						<input type="submit" name="edit" value="edit">
                    
                    </td>
					<td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    <td colspan="2">
                   
					</td>
				</tr>
				

            </table>

				<?php	
				}

			?>
                
                </fieldset>
                </form>
                </center>
			</td>

            
            
		</tr>

		<tr height = "50px">
			<td colspan="3">
				<center> Copyright &copy 2021 </center>
			</td>
		</tr>
        
	</table>

    </nav>
</body>
</html>

<?php

	}else{
		echo "Please do Registration before login in";
		header('location: ../../view/signup.php');
	}

?>