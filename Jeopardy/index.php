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

            <!--NOTE: quest1-1 mean question at row 1 column 1-->
            <tr>
                <!--$200 questions row-->
                <?php
                    if ($_SESSION['check1-1'] == true) {
                        if ($_SESSION['current_dollar1-1'] > $_SESSION['prev_dollar1-1']) {
                            echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                        } 
                        else if ($_SESSION['current_dollar1-1'] < $_SESSION['prev_dollar1-1']) {
                            echo '<td><a style="color: #FF7276;">-$200</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest1-1=1"> $200</a></td>';
                    }

                    if ($_SESSION['check1-2'] == true) {
                        if ($_SESSION['current_dollar1-2'] > $_SESSION['prev_dollar1-2']) {
                            echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                        } 
                        else if ($_SESSION['current_dollar1-2'] < $_SESSION['prev_dollar1-2']) {
                            echo '<td><a style="color: #FF7276;">-$200</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest1-2=1"> $200</a></td>';
                    }

                    if ($_SESSION['check1-3'] == true) {
                        if ($_SESSION['current_dollar1-3'] > $_SESSION['prev_dollar1-3']) {
                            echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                        } 
                        else if ($_SESSION['current_dollar1-3'] < $_SESSION['prev_dollar1-3']){
                            echo '<td><a style="color: #FF7276;">-$200</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest1-3=1"> $200</a></td>';
                    }

                    if ($_SESSION['check1-4'] == true) {
                        if ($_SESSION['current_dollar1-4'] > $_SESSION['prev_dollar1-4']) {
                            echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                        } 
                        else if ($_SESSION['current_dollar1-4'] < $_SESSION['prev_dollar1-4']) {
                            echo '<td><a style="color: #FF7276;">-$200</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest1-4=1"> $200</a></td>';
                    }

                    if ($_SESSION['check1-5'] == true) {
                        if ($_SESSION['current_dollar1-5'] > $_SESSION['prev_dollar1-5']) {
                            echo '<td><a style="color: #2BDA8E;">+$200</a></td>';
                        } 
                        else if ($_SESSION['current_dollar1-5'] < $_SESSION['prev_dollar1-5']) {
                            echo '<td><a style="color: #FF7276;">-$200</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest1-5=1"> $200</a></td>';
                    }
                ?>
            </tr>

            <tr>
                <!--$400 questions row-->
                <?php
                    if ($_SESSION['check2-1'] == true) {
                        if ($_SESSION['current_dollar2-1'] > $_SESSION['prev_dollar2-1']) {
                            echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                        } 
                        else if ($_SESSION['current_dollar2-1'] < $_SESSION['prev_dollar2-1']) {
                            echo '<td><a style="color: #FF7276;">-$400</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest2-1=1"> $400</a></td>';
                    }
                
                    if ($_SESSION['check2-2'] == true) {
                        if ($_SESSION['current_dollar2-2'] > $_SESSION['prev_dollar2-2']) {
                            echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                        } 
                        else if ($_SESSION['current_dollar2-2'] < $_SESSION['prev_dollar2-2']) {
                            echo '<td><a style="color: #FF7276;">-$400</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest2-2=1"> $400</a></td>';
                    }

                    if ($_SESSION['check2-3'] == true) {
                        if ($_SESSION['current_dollar2-3'] > $_SESSION['prev_dollar2-3']) {
                            echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                        } 
                        else if ($_SESSION['current_dollar2-3'] < $_SESSION['prev_dollar2-3']) {
                            echo '<td><a style="color: #FF7276;">-$400</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest2-3=1"> $400</a></td>';
                    }

                    if ($_SESSION['check2-4'] == true) {
                        if ($_SESSION['current_dollar2-4'] > $_SESSION['prev_dollar2-4']) {
                            echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                        } 
                        else if ($_SESSION['current_dollar2-4'] < $_SESSION['prev_dollar2-4']) {
                            echo '<td><a style="color: #FF7276;">-$400</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest2-4=1"> $400</a></td>';
                    }

                    if ($_SESSION['check2-5'] == true) {
                        if ($_SESSION['current_dollar2-5'] > $_SESSION['prev_dollar2-5']) {
                            echo '<td><a style="color: #2BDA8E;">+$400</a></td>';
                        } 
                        else if ($_SESSION['current_dollar2-5'] < $_SESSION['prev_dollar2-5']) {
                            echo '<td><a style="color: #FF7276;">-$400</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest2-5=1"> $400</a></td>';
                    }
                ?>
            </tr>

            <tr>
                <!--$600 questions row-->
                <?php
                    if ($_SESSION['check3-1'] == true) {
                        if ($_SESSION['current_dollar3-1'] > $_SESSION['prev_dollar3-1']) {
                            echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                        } 
                        else if ($_SESSION['current_dollar3-1'] < $_SESSION['prev_dollar3-1']) {
                            echo '<td><a style="color: #FF7276;">-$600</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest3-1=1"> $600</a></td>';
                    }

                    if ($_SESSION['check3-2'] == true) {
                        if ($_SESSION['current_dollar3-2'] > $_SESSION['prev_dollar3-2']) {
                            echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                        } 
                        else if ($_SESSION['current_dollar3-2'] < $_SESSION['prev_dollar3-2']) {
                            echo '<td><a style="color: #FF7276;">-$600</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest3-2=1"> $600</a></td>';
                    }

                    if ($_SESSION['check3-3'] == true) {
                        if ($_SESSION['current_dollar3-3'] > $_SESSION['prev_dollar3-3']) {
                            echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                        } 
                        else if ($_SESSION['current_dollar3-3'] < $_SESSION['prev_dollar3-3']) {
                            echo '<td><a style="color: #FF7276;">-$600</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest3-3=1"> $600</a></td>';
                    }

                    if ($_SESSION['check3-4'] == true) {
                        if ($_SESSION['current_dollar3-4'] > $_SESSION['prev_dollar3-4']) {
                            echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                        } 
                        else if ($_SESSION['current_dollar3-4'] < $_SESSION['prev_dollar3-4']) {
                            echo '<td><a style="color: #FF7276;">-$600</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest3-4=1"> $600</a></td>';
                    }

                    if ($_SESSION['check3-5'] == true) {
                        if ($_SESSION['current_dollar3-5'] > $_SESSION['prev_dollar3-5']) {
                            echo '<td><a style="color: #2BDA8E;">+$600</a></td>';
                        } 
                        else if ($_SESSION['current_dollar3-5'] < $_SESSION['prev_dollar3-5']) {
                            echo '<td><a style="color: #FF7276;">-$600</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest3-5=1"> $600</a></td>';
                    }
                ?>
            </tr>

            <tr>
                <!--$800 questions row-->
                <?php
                    if ($_SESSION['check4-1'] == true) {
                        if ($_SESSION['current_dollar4-1'] > $_SESSION['prev_dollar4-1']) {
                            echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                        } 
                        else if ($_SESSION['current_dollar4-1'] < $_SESSION['prev_dollar4-1']) {
                            echo '<td><a style="color: #FF7276;">-$800</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest4-1=1"> $800</a></td>';
                    }

                    if ($_SESSION['check4-2'] == true) {
                        if ($_SESSION['current_dollar4-2'] > $_SESSION['prev_dollar4-2']) {
                            echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                        } 
                        else if ($_SESSION['current_dollar4-2'] < $_SESSION['prev_dollar4-2']) {
                            echo '<td><a style="color: #FF7276;">-$800</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest4-2=1"> $800</a></td>';
                    }

                    if ($_SESSION['check4-3'] == true) {
                        if ($_SESSION['current_dollar4-3'] > $_SESSION['prev_dollar4-3']) {
                            echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                        } 
                        else if ($_SESSION['current_dollar4-3'] < $_SESSION['prev_dollar4-3']) {
                            echo '<td><a style="color: #FF7276;">-$800</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest4-3=1"> $800</a></td>';
                    }

                    if ($_SESSION['check4-4'] == true) {
                        if ($_SESSION['current_dollar4-4'] > $_SESSION['prev_dollar4-4']) {
                            echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                        } 
                        else if ($_SESSION['current_dollar4-4'] < $_SESSION['prev_dollar4-4']) {
                            echo '<td><a style="color: #FF7276;">-$800</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest4-4=1"> $800</a></td>';
                    }

                    if ($_SESSION['check4-5'] == true) {
                        if ($_SESSION['current_dollar4-5'] > $_SESSION['prev_dollar4-5']) {
                            echo '<td><a style="color: #2BDA8E;">+$800</a></td>';
                        } 
                        else if ($_SESSION['current_dollar4-5'] < $_SESSION['prev_dollar4-5']) {
                            echo '<td><a style="color: #FF7276;">-$800</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest4-5=1"> $800</a></td>';
                    }
                ?>
            </tr>

            <tr>
                <!--$1000 questions row-->
                <?php
                    if ($_SESSION['check5-1'] == true) {
                        if ($_SESSION['current_dollar5-1'] > $_SESSION['prev_dollar5-1']) {
                            echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                        } 
                        else if ($_SESSION['current_dollar5-1'] < $_SESSION['prev_dollar5-1']) {
                            echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest5-1=1"> $1000</a></td>';
                    }

                    if ($_SESSION['check5-2'] == true) {
                        if ($_SESSION['current_dollar5-2'] > $_SESSION['prev_dollar5-2']) {
                            echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                        } 
                        else if ($_SESSION['current_dollar5-2'] < $_SESSION['prev_dollar5-2']) {
                            echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest5-2=1"> $1000</a></td>';
                    }

                    if ($_SESSION['check5-3'] == true) {
                        if ($_SESSION['current_dollar5-3'] > $_SESSION['prev_dollar5-3']) {
                            echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                        } 
                        else if ($_SESSION['current_dollar5-3'] < $_SESSION['prev_dollar5-3']) {
                            echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest5-3=1"> $1000</a></td>';
                    }

                    if ($_SESSION['check5-4'] == true) {
                        if ($_SESSION['current_dollar5-4'] > $_SESSION['prev_dollar5-4']) {
                            echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                        } 
                        else if ($_SESSION['current_dollar5-4'] < $_SESSION['prev_dollar5-4']) {
                            echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest5-4=1"> $1000</a></td>';
                    }

                    if ($_SESSION['check5-5'] == true) {
                        if ($_SESSION['current_dollar5-5'] > $_SESSION['prev_dollar5-5']) {
                            echo '<td><a style="color: #2BDA8E;">+$1000</a></td>';
                        } 
                        else if ($_SESSION['current_dollar5-5'] < $_SESSION['prev_dollar5-5']) {
                            echo '<td><a style="color: #FF7276;">-$1000</a></td>';
                        }
                    } else {
                        echo '<td><a id="value" href="question.php?quest5-5=1"> $1000</a></td>';
                    }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>