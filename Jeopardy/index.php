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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div id="right_side">
        <div>
            <a href="logout.php" class="logout-button" name="logout" value="Logout">Log out</a>
        </div>

        <div>
            <a href="rank.php" class="rank-button">Rank</a>
        </div>
    </div>

    <div id="left_side">
        <div class="player">
            Welcome! <span style="color: yellow;"> <?php print ucfirst($_SESSION['username']); ?> </span>
        </div>

        <div class="score">
            Earns: <span style="color: yellow;"> $<?php print ucfirst($_SESSION['dollar']); ?> </span>
        </div>
    </div>

    <div id="jeopardy-board">
        <table>
            <tr>
                <!--Game's name-->
                <th colspan="5" style="letter-spacing: 3px; color: yellow; font-size: 18px">Jeopardy!</th>
            </tr>
            <tr>
                <!--Category row-->
                <th>History</th>
                <th>Science</th>
                <th>Sports</th>
                <th>Geography</th>
                <th>Art & Artiest</th>
            </tr>

            <!--NOTE - EXAMPLE: quest1- .$suffix = quest1-1 which mean question at row 1 column 1-->
            <?php
                for ($i = 0; $i < 5; $i++) {
            ?>
                <tr>
                    <?php
                        for ($j = 0; $j < 5; $j++) {
                            $check_key = 'check'.($i+1).'-'.($j+1);
                            $current_dollar_key = 'current_dollar'.($i+1).'-'.($j+1);
                            $prev_dollar_key = 'prev_dollar'.($i+1).'-'.($j+1);
                            
                            if ($_SESSION[$check_key] == true) {
                                if ($_SESSION[$current_dollar_key] > $_SESSION[$prev_dollar_key]) {
                                    echo '<td><a style="color: #2BDA8E;">+$' .(($i+1)*200). '</a></td>';
                                } else if ($_SESSION[$current_dollar_key] < $_SESSION[$prev_dollar_key]) {
                                    echo '<td><a style="color: #FF7276;">-$'.(($i+1)*200). '</a></td>';
                                }
                            } else {
                                echo '<td><a id="value" href="question.php?quest'.($i+1).'-'.($j+1).'=1"> $'.(($i+1)*200).'</a></td>';
                            }
                        }
                    ?>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>

</html>