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

    /*This suffix represent the number of column */
    $suffixes = array("1", "2", "3", "4", "5");
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
            <tr>
                <!--$200 questions row-->
                <?php
                    foreach ($suffixes as $suffix) {
                        if ($_SESSION['check1-'.$suffix] == true) {
                            /*Check player answer correct or incorrect by compare current and prev dollar
                            also, disable the link to let player can't go back to the question. */
                            if ($_SESSION['current_dollar1-'.$suffix] > $_SESSION['prev_dollar1-'.$suffix]) {
                                echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                            } else if ($_SESSION['current_dollar1-'.$suffix] < $_SESSION['prev_dollar1-'.$suffix]) {
                                echo '<td><a style="color: #FF7276;">-$200</a></td>';
                            }
                        } else {
                            echo '<td><a id="value" href="question.php?quest1-'.$suffix.'=1"> $200</a></td>';
                        }
                    }
                ?>
            </tr>

            <tr>
                <!--$400 questions row-->
                <?php
                    foreach ($suffixes as $suffix) {
                        if ($_SESSION['check2-'.$suffix] == true) {
                            if ($_SESSION['current_dollar2-'.$suffix] > $_SESSION['prev_dollar2-'.$suffix]) {
                                echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                            } else if ($_SESSION['current_dollar2-'.$suffix] < $_SESSION['prev_dollar2-'.$suffix]) {
                                echo '<td><a style="color: #FF7276;">-$400</a></td>';
                            }
                        } else {
                            echo '<td><a id="value" href="question.php?quest2-'.$suffix.'=1"> $400</a></td>';
                        }
                    }
                ?>
            </tr>

            <tr>
                <!--$600 questions row-->
                <?php
                    foreach ($suffixes as $suffix) {
                        if ($_SESSION['check3-'.$suffix] == true) {
                            if ($_SESSION['current_dollar3-'.$suffix] > $_SESSION['prev_dollar3-'.$suffix]) {
                                echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                            } else if ($_SESSION['current_dollar3-'.$suffix] < $_SESSION['prev_dollar3-'.$suffix]) {
                                echo '<td><a style="color: #FF7276;">-$600</a></td>';
                            }
                        } else {
                            echo '<td><a id="value" href="question.php?quest3-'.$suffix.'=1"> $600</a></td>';
                        }
                    }
                ?>
            </tr>

            <tr>
                <!--$800 questions row-->
                <?php
                    foreach ($suffixes as $suffix) {
                        if ($_SESSION['check4-'.$suffix] == true) {
                            if ($_SESSION['current_dollar4-'.$suffix] > $_SESSION['prev_dollar4-'.$suffix]) {
                                echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                            } else if ($_SESSION['current_dollar4-'.$suffix] < $_SESSION['prev_dollar4-'.$suffix]) {
                                echo '<td><a style="color: #FF7276;">-$800</a></td>';
                            }
                        } else {
                            echo '<td><a id="value" href="question.php?quest4-'.$suffix.'=1"> $800</a></td>';
                        }
                    }
                ?>
            </tr>

            <tr>
                <!--$1000 questions row-->
                <?php
                    foreach ($suffixes as $suffix) {
                        if ($_SESSION['check5-'.$suffix] == true) {
                            if ($_SESSION['current_dollar5-'.$suffix] > $_SESSION['prev_dollar5-'.$suffix]) {
                                echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                            } else if ($_SESSION['current_dollar5-'.$suffix] < $_SESSION['prev_dollar5-'.$suffix]) {
                                echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                            }
                        } else {
                            echo '<td><a id="value" href="question.php?quest5-'.$suffix.'=1"> $1000</a></td>';
                        }
                    }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>