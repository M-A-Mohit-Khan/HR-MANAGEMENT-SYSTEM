<?php
	session_start();
	if(isset($_SESSION['flag']))
	{

	/*require_once('../model/dbConnection.php');
	require_once('../model/userModel.php');

	$connection = getConnection();
	$userList = getAdmin();*/

    require_once('../model/dbConnection.php');
	require_once('../model/userModel.php');
	

	//$id = $_GET['id'];
	$userid = $_SESSION['userId'];
	$connection = getConnection();
	$selectedUser = getloginbyId($userid);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>

</head>

<body>
    <header>

    <table width="100%" cellspacing="0">

		<tr>
			<td align="right">
				<a href="dashBoard.php"> <img width="200px" src="websitelogo.png" align="left"> </a> 
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

            <td width="67%">
                <center>
                <form method="POST" action="">
                <fieldset style="width: 33%">
                <table>
                    <tr>
                        <td colspan="10">
                            Name : 
                        </td>

                        <td>
                        <?php echo $selectedUser['name']?> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            User ID : 
                        </td>

                        

                        <td>
                        <?php echo $selectedUser['userid']?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="10">
                            Email : 
                        </td>
                       
                        <td>
                        <?php echo $selectedUser['email']?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            Password : 
                        </td>
                        
                        <td>
                        <?php echo $selectedUser['password']?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            Gender : 
                        </td>
                        
                        <td>
                        <?php echo $selectedUser['gender']?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            Date Of Birth : 
                        </td>
                        
                        <td>
                        <?php echo $selectedUser['dob']?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            Address : 
                        </td>
                        
                        <td>
                        <?php echo $selectedUser['address']?>
                        </td>
                    </tr>
                   
                </table>
                <?php
	
	?>
        
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