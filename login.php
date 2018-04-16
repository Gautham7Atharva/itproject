<?php
    if(isset($_POST['Login']))
    {
        $con = mysqli_connect('localhost', 'root', 'tiger', 'it');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($con, 'select * from it where uname="'.$username.'" and password="'.$password.'"');
        if(mysqli_num_rows($result)==1)
        {
			session_start();
            $_SESSION['name']=$_POST['username'];
			header('Location: home.php');
            die();
        }
        else
        {   
            $idMessage = "Ivalid username and password.";
        }
    }
?>
<html>
	<head>
		<title> Login page</title>
	</head>
	<body bgcolor="">
		<form action="login.php" method="POST">
					<label for="Username" ><b>Username:</b></label>
					<input type="text" id="username" name="username" /><br/><br/>
					<label for="password"><b>Password:</b></label>
					<input type="Password" id="Password" name="password" /><br/><br/>
					<input type="submit" value="Login" name="Login" /><br/>
		</form>
		<script> 
			<?php
				if($idMessage != '')
				{
					echo "alert('" . $idMessage . "')";
				}
			?>
		</script>
	</body>
</html>
