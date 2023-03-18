<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="general.css">
</head>
<body>
    <?php	
		$arr = array();

		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
            
            /*Read rank.txt file, stores them in an array, and sets the user's ranking to 0 if the file is empty.*/
            $strTemp = trim(file_get_contents('rank.txt'));
            $_SESSION['tempArray'] = explode(" ",$strTemp);
            $_SESSION['ranking'] = array();
            if(strcmp($strTemp,'') != 0){
                for($i = 0 ; $i< count($_SESSION['tempArray']); $i+=2){
                    $array = array();
                    $array[$_SESSION['tempArray'][$i]] = $_SESSION['tempArray'][$i+1];
                    $_SESSION['ranking'] = array_merge($_SESSION['ranking'],$array);
                }
            } else {
                $_SESSION['ranking'][$_SESSION['username']] = 0;
            }


            /*Set dollar to 0, when user login */
            $_SESSION['dollar'] = 0;

            /*Check input is empty or not, and check data if user and password correct or inccorect */
			if ($username == "" || $password == "") {
				$arr["mess"] = '<p style="color:red; text-align: center; font-weight:bold">Invalid! Please try again</p>';
			} else {
				$data = file_get_contents('db.txt');
				$arr = explode(",", $data);
				for ($i = 0; $i < sizeof($arr); $i+=2) {
					if ($username == $arr[$i] && $password == $arr[$i+1]) {
						$_SESSION['username'] = $username;
						header('Location: index.php');
						exit();
					}
				}
				$arr["mess"] = '<p style="color:red; text-align: center; font-weight:bold">Invalid! Please try again</p><br>';
			}
		}		
	?>
    <br><br><br>
    <div class="wrap">
        <form class="form-page" action="" method="post" name="Login_Form">
            <h2 style="text-align:center; padding-bottom: 15px">Login</h2>

            <label for="username"><b>Username</b></label>
            <input class="form-input" type="text" name="username" placeholder="username" required="">

            <label for="password"><b>Password</b></label>
            <input class="form-input" type="password" name="password" placeholder="password" required="">

            <?php
                /*Print message if inccorect username or password */
                if (isset($arr["mess"])) {
                    echo $arr["mess"];
                }
            ?>

            <button class="login-button" name="login" type="submit" value="Login">Log in</button>
            
            <div class="login-or-register">
                <p>Don't have an account? <a href="register.php">Register</a>.</p>
            </div>
            <br>
            <hr><br>
            <h2 style="text-align:center ; font-weight:bold">Developers</h2>
            <table>
                <tr>
                    <td>Musungedi Etongwe</td>
                    <td>Minh Le</td>
                </tr>
                <tr>
                    <td>Ekram Ibrahim</td>
                    <td>Anvar Suleyman</td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
