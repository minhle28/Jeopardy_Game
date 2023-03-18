<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
        exit();
    }
    if (isset($_POST['logout'])) {
        header('location: logout.php');
        exit();
    }

    $_SESSION['ranking'][$_SESSION['username']] = $_SESSION['dollar'];
    $str_temp = '';
    foreach ($_SESSION['ranking'] as $user => $money) {
        $str_temp = $str_temp . " " . $user . " " . $money;
    }
    file_put_contents('rank.txt', $str_temp);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="rank.css">
</head>

<body>
    <div>
        <a href="logout.php" class="logout-button" name="logout" value="Logout">Log out</a>
    </div>

    <div>
        <a href="index.php" class="back-button">Go Back</a>
    </div>
    

    <div id="content">
        <?php
            arsort($_SESSION['ranking']);
            $i = 1;

            echo '
                <h1 class="rank-winner">Congratulations, '.ucfirst(array_keys($_SESSION['ranking'])[0]).'</h1>
                <h1 class="rank-win">You win!</h1>
                <br>
            
                <div class="rank-leadingboard">
                    <br>
                    <table>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Money Earned</th>
                        </tr>
            ';

            foreach($_SESSION['ranking'] as $user=>$money) {

                $suffix = '';
                if ($i == 1) {
                    $suffix = 'st';
                }
                else if ($i == 2) {
                    $suffix = 'nd';
                }
                else if ($i == 3) {
                    $suffix = 'rd';
                }
                else {
                    $suffix = 'th';
                }

                echo '
                    <tr>
                        <td>' . $i . $suffix . '</td>
                        <td>'.$user.'</td>
                        <td>$'.$money.'</td>
                    </tr>
                    <br>
                ';
                $i += 1;
            }
            echo '</table>';
            echo '</div>';
        ?>
    </div> 
</body>

</html>