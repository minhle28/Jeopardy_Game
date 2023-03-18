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

    /*Store current dollar as a pevious dollar*/
    $_SESSION['prev_dollar'] = $_SESSION['dollar'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="question.css">
</head>

<body>
    <div>
        <a href="logout.php" class="logout-button" name="logout" value="Logout">Log out</a>
    </div>

    <div id="left_side">
        <div class="player">
            Welcome! <span style="color: yellow;"> <?php print ucfirst($_SESSION['username']); ?> </span>
        </div>

        <div class="score">
            Earns: <span style="color: yellow;"> $<?php print ucfirst($_SESSION['dollar']); ?> </span>
        </div>
    </div>

    <div id="board">
        <div class="content">
            <?php
                /*Store answers to array*/
                $history_answer = array("Washington", "1971", "Formula Translation", "W3C", "Javascript");
                $science_answer = array("web development", "HTML", "Domain Name System", "software testing", "AngularJS");
                $sport_answer = array("FIFA World cup", "Super Bowl", "catcher", "the UEFA Champions League", "the Kentucky Derby");
                $geography_answer = array("Rhode Island", "Sahara Desert", "Madrid", "the Nile River", "Canberra");
                $art_answer = array("Leonardo da Vinci", "Vincent van Gogh", "Louvre Museum", "Ken Knowlton", "Ray Tracing");

                /*Check submit from row 1*/
                if (isset($_POST['submit_row1'])) {
                    /*Check for row 1, column 1 to 5 ($200)*/
                    if ($_POST['answer1-1'] == $history_answer[0] || $_POST['answer1-2'] == $science_answer[0] || $_POST['answer1-3'] == $sport_answer[0] || $_POST['answer1-4'] == $geography_answer[0] || $_POST['answer1-5'] == $art_answer[0]) {
                        $_SESSION['dollar'] += 200;
                    } else {
                        $_SESSION['dollar'] -= 200;
                    }
                }
                
                /*Check submit from row 2*/
                if (isset($_POST['submit_row2'])) {
                    /*Check for row 2, column 1 to 5 ($400)*/
                    if ($_POST['answer2-1'] == $history_answer[1] || $_POST['answer2-2'] == $science_answer[1] || $_POST['answer2-3'] == $sport_answer[1] || $_POST['answer2-4'] == $geography_answer[1] || $_POST['answer2-5'] == $art_answer[1]) {
                        $_SESSION['dollar'] += 400;
                    } else {
                        $_SESSION['dollar'] -= 400;
                    }
                }
                
                /*Check submit from row 3*/
                if (isset($_POST['submit_row3'])) {
                    /*Check for row 3, column 1 to 5 ($600)*/
                    if ($_POST['answer3-1'] == $history_answer[2] || $_POST['answer3-2'] == $science_answer[2] || $_POST['answer3-3'] == $sport_answer[2] || $_POST['answer3-4'] == $geography_answer[2] || $_POST['answer3-5'] == $art_answer[2]) {
                        $_SESSION['dollar'] += 600;
                    } else {
                        $_SESSION['dollar'] -= 600;
                    }
                }
                
                /*Check submit from row 4*/
                if (isset($_POST['submit_row4'])) {
                    /*Check for row 4, column 1 to 5 ($800)*/
                    if ($_POST['answer4-1'] == $history_answer[3] || $_POST['answer4-2'] == $science_answer[3] || $_POST['answer4-3'] == $sport_answer[3] || $_POST['answer4-4'] == $geography_answer[3] || $_POST['answer4-5'] == $art_answer[3]) {
                        $_SESSION['dollar'] += 800;
                    } else {
                        $_SESSION['dollar'] -= 800;
                    }
                }

                /*Check submit from row 5*/
                if (isset($_POST['submit_row5'])) {
                    /*Check for row 5, column 1 to 5 ($1000)*/
                    if ($_POST['answer5-1'] == $history_answer[4] || $_POST['answer5-2'] == $science_answer[4] || $_POST['answer5-3'] == $sport_answer[4] || $_POST['answer5-4'] == $geography_answer[4] || $_POST['answer5-5'] == $art_answer[4]) {
                        $_SESSION['dollar'] += 1000;
                    } else {
                        $_SESSION['dollar'] -= 1000;
                    }
                }

                /*For row 1*/
                if (isset($_GET['quest1-1']) && $_GET['quest1-1'] == 1) {
                    if (isset($_POST['submit_row1'])) {
                        /*Store dollar to id current dollar and prev dollar to id prev dollar, 
                        different id will check for each row and column*/
                        $_SESSION['current_dollar1-1'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar1-1'] = $_SESSION['prev_dollar'];
                        $_SESSION['check1-1'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>History $200</h2>
                        <h3>Who was the first US president?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer1-1" placeholder="Who is ___ ?" required="">
                            <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest1-2']) && $_GET['quest1-2'] == 1) {
                    if (isset($_POST['submit_row1'])) {
                        $_SESSION['current_dollar1-2'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar1-2'] = $_SESSION['prev_dollar'];
                        $_SESSION['check1-2'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Science $200</h2>
                        <h3>What is the term used to describe the process of creating a web page using HTML, CSS, and JavaScript?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer1-2" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest1-3']) && $_GET['quest1-3'] == 1) {
                    if (isset($_POST['submit_row1'])) {
                        $_SESSION['current_dollar1-3'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar1-3'] = $_SESSION['prev_dollar'];
                        $_SESSION['check1-3'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Sports $200</h2>
                        <h3>What is the name of the international soccer tournament held every four years, featuring teams from around the world?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer1-3" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest1-4']) && $_GET['quest1-4'] == 1) {
                    if (isset($_POST['submit_row1'])) {
                        $_SESSION['current_dollar1-4'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar1-4'] = $_SESSION['prev_dollar'];
                        $_SESSION['check1-4'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Geography $200</h2>
                        <h3>What is the smallest state in America?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer1-4" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest1-5']) && $_GET['quest1-5'] == 1) {
                    if (isset($_POST['submit_row1'])) {
                        $_SESSION['current_dollar1-5'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar1-5'] = $_SESSION['prev_dollar'];
                        $_SESSION['check1-5'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Art & Artiest $200</h2>
                        <h3>Who painted the Mona Lisa?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer1-5" placeholder="Who is ___ ?" required="">
                            <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                        </form>
                    ';
                }

                /*For row 2*/
                else if (isset($_GET['quest2-1']) && $_GET['quest2-1'] == 1) {
                    if (isset($_POST['submit_row2'])) {
                        $_SESSION['current_dollar2-1'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar2-1'] = $_SESSION['prev_dollar'];
                        $_SESSION['check2-1'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>History $400</h2>
                        <h3>In what year was the first microprocessor invented?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer2-1" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest2-2']) && $_GET['quest2-2'] == 1) {
                    if (isset($_POST['submit_row2'])) {
                        $_SESSION['current_dollar2-2'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar2-2'] = $_SESSION['prev_dollar'];
                        $_SESSION['check2-2'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Science $400</h2>
                        <h3>What is the name of the markup language used to create web pages, which is used to define the structure and content of a web page?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer2-2" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest2-3']) && $_GET['quest2-3'] == 1) {
                    if (isset($_POST['submit_row2'])) {
                        $_SESSION['current_dollar2-3'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar2-3'] = $_SESSION['prev_dollar'];
                        $_SESSION['check2-3'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Sports $400</h2>
                        <h3>What is the name of the American football championship game played annually between the winners of the AFC and NFC?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer2-3" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest2-4']) && $_GET['quest2-4'] == 1) {
                    if (isset($_POST['submit_row2'])) {
                        $_SESSION['current_dollar2-4'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar2-4'] = $_SESSION['prev_dollar'];
                        $_SESSION['check2-4'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Geography $400</h2>
                        <h3>What is the name of the largest desert in the world, covering much of Northern Africa?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer2-4" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest2-5']) && $_GET['quest2-5'] == 1) {
                    if (isset($_POST['submit_row2'])) {
                        $_SESSION['current_dollar2-5'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar2-5'] = $_SESSION['prev_dollar'];
                        $_SESSION['check2-5'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Art & Artiest $400</h2>
                        <h3>Who painted the Starry Night?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer2-5" placeholder="Who is ___ ?" required="">
                            <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                        </form>
                    ';
                }


                /*For row 3*/
                else if (isset($_GET['quest3-1']) && $_GET['quest3-1'] == 1) {
                    if (isset($_POST['submit_row3'])) {
                        $_SESSION['current_dollar3-1'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar3-1'] = $_SESSION['prev_dollar'];
                        $_SESSION['check3-1'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>History $600</h2>
                        <h3>What was the first popular programming language created in 1957?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer3-1" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest3-2']) && $_GET['quest3-2'] == 1) {
                    if (isset($_POST['submit_row3'])) {
                        $_SESSION['current_dollar3-2'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar3-2'] = $_SESSION['prev_dollar'];
                        $_SESSION['check3-2'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Science $600</h2>
                        <h3>In computer networking, what does DNS stand for?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer3-2" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest3-3']) && $_GET['quest3-3'] == 1) {
                    if (isset($_POST['submit_row3'])) {
                        $_SESSION['current_dollar3-3'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar3-3'] = $_SESSION['prev_dollar'];
                        $_SESSION['check3-3'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Sports $600</h2>
                        <h3>In baseball, what is the term for the defensive player who stands behind home plate and catches the pitches thrown by the pitcher?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer3-3" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest3-4']) && $_GET['quest3-4'] == 1) {
                    if (isset($_POST['submit_row3'])) {
                        $_SESSION['current_dollar3-4'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar3-4'] = $_SESSION['prev_dollar'];
                        $_SESSION['check3-4'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Geography $600</h2>
                        <h3>What is the capital city of Spain, known for its art, architecture, and football?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer3-4" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest3-5']) && $_GET['quest3-5'] == 1) {
                    if (isset($_POST['submit_row3'])) {
                        $_SESSION['current_dollar3-5'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar3-5'] = $_SESSION['prev_dollar'];
                        $_SESSION['check3-5'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Art & Artiest $600</h2>
                        <h3>What is the name of the most visited museum in Paris that is shaped like a glass pyramid?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer3-5" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                        </form>
                    ';
                }


                /*For row 4*/
                else if (isset($_GET['quest4-1']) && $_GET['quest4-1'] == 1) {
                    if (isset($_POST['submit_row4'])) {
                        $_SESSION['current_dollar4-1'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar4-1'] = $_SESSION['prev_dollar'];
                        $_SESSION['check4-1'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>History $800</h2>
                        <h3>What is the name of the organization that sets standards for the World Wide Web, including HTML, CSS, and other technologies?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer4-1" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest4-2']) && $_GET['quest4-2'] == 1) {
                    if (isset($_POST['submit_row4'])) {
                        $_SESSION['current_dollar4-2'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar4-2'] = $_SESSION['prev_dollar'];
                        $_SESSION['check4-2'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Science $800</h2>
                        <h3>What is the name of the process used to test software for defects or errors before it is released to the public?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer4-2" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest4-3']) && $_GET['quest4-3'] == 1) {
                    if (isset($_POST['submit_row4'])) {
                        $_SESSION['current_dollar4-3'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar4-3'] = $_SESSION['prev_dollar'];
                        $_SESSION['check4-3'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Sports $800</h2>
                        <h3>What is the name of the international soccer club competition featuring the best teams from across Europe?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer4-3" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest4-4']) && $_GET['quest4-4'] == 1) {
                    if (isset($_POST['submit_row4'])) {
                        $_SESSION['current_dollar4-4'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar4-4'] = $_SESSION['prev_dollar'];
                        $_SESSION['check4-4'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Geography $800</h2>
                        <h3>What is the name of the longest river in Africa, flowing through ten countries before emptying into the Mediterranean Sea?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer4-4" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest4-5']) && $_GET['quest4-5'] == 1) {
                    if (isset($_POST['submit_row4'])) {
                        $_SESSION['current_dollar4-5'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar4-5'] = $_SESSION['prev_dollar'];
                        $_SESSION['check4-5'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Art & Artiest $800</h2>
                        <h3>Who created the first computer-generated piece of art in 1963?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer4-5" placeholder="Who is ___ ?" required="">
                            <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                        </form>
                    ';
                }


                /*For row 5*/
                else if (isset($_GET['quest5-1']) && $_GET['quest5-1'] == 1) {
                    if (isset($_POST['submit_row5'])) {
                        $_SESSION['current_dollar5-1'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar5-1'] = $_SESSION['prev_dollar'];
                        $_SESSION['check5-1'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>History $1000</h2>
                        <h3>What is the name of the programming language used to create dynamic web pages, which was created by Brendan Eich in 1995 and was originally called Mocha?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer5-1" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest5-2']) && $_GET['quest5-2'] == 1) {
                    if (isset($_POST['submit_row5'])) {
                        $_SESSION['current_dollar5-2'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar5-2'] = $_SESSION['prev_dollar'];
                        $_SESSION['check5-2'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Science $1000</h2>
                        <h3>What is the name of the framework developed by Google for building web applications using HTML, CSS, and JavaScript?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer5-2" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest5-3']) && $_GET['quest5-3'] == 1) {
                    if (isset($_POST['submit_row5'])) {
                        $_SESSION['current_dollar5-3'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar5-3'] = $_SESSION['prev_dollar'];
                        $_SESSION['check5-3'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Sports $1000</h2>
                        <h3>What is the name of the horse race that takes place annually on the first Saturday in May in Louisville, Kentucky?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer5-3" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest5-4']) && $_GET['quest5-4'] == 1) {
                    if (isset($_POST['submit_row5'])) {
                        $_SESSION['current_dollar5-4'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar5-4'] = $_SESSION['prev_dollar'];
                        $_SESSION['check5-4'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Geography $1000</h2>
                        <h3>What is the capital city of Australia, located on the southeast coast?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer5-4" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                        </form>
                    ';
                }
                else if (isset($_GET['quest5-5']) && $_GET['quest5-5'] == 1) {
                    if (isset($_POST['submit_row5'])) {
                        $_SESSION['current_dollar5-5'] = $_SESSION['dollar'];
                        $_SESSION['prev_dollar5-5'] = $_SESSION['prev_dollar'];
                        $_SESSION['check5-5'] = true;
                        header("location: index.php");
                    }
                    echo '
                        <h2>Art & Artiest $1000</h2>
                        <h3>What is the name of the process used to create photorealistic 3D images and animations, often used in movies and video games?</h3>
                        <form method="post" id="form">
                            <label for="answer"><b>Your answer.</b></label>
                            <input class="answer-input" type="text" name="answer5-5" placeholder="What is ___ ?" required="">
                            <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                        </form>
                    ';
                }
            ?>

        </div>
    </div>
</body>

</html>