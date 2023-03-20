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

    <div id="info">
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

                $category = '';
                $question = '';
                $answer_name = '';

                /*For row 1*/
                for ($i=1; $i<=5; $i++) {
                    if (isset($_GET['quest1-' .$i]) && $_GET['quest1-' .$i] == 1) {
                        if (isset($_POST['submit_row1'])) {
                            /*Store current dollar and prev dollar to other name for each row and column, 
                            make it different to let them not affect together when checking*/
                            $_SESSION['current_dollar1-' .$i] = $_SESSION['dollar'];
                            $_SESSION['prev_dollar1-' .$i] = $_SESSION['prev_dollar'];
                            /*Set the check true when player submit*/
                            $_SESSION['check1-' .$i] = true;
                            header("location: index.php");
                        }
                        switch ($i) {
                            case 1:
                                $category = 'History';
                                $question = 'Who was the first US president?';
                                $answer_name = 'answer1-1';
                                $place_holder = 'Who is ___ ?';
                                break;
                            case 2:
                                $category = 'Science';
                                $question = 'What is the term used to describe the process of creating a web page using HTML, CSS, and JavaScript?';
                                $answer_name = 'answer1-2';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 3:
                                $category = 'Sports';
                                $question = 'What is the name of the international soccer tournament held every four years, featuring teams from around the world?';
                                $answer_name = 'answer1-3';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 4:
                                $category = 'Geography';
                                $question = 'What is the smallest state in America?';
                                $answer_name = 'answer1-4';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 5:
                                $category = 'Art & Artiest';
                                $question = 'Who painted the Mona Lisa?';
                                $answer_name = 'answer1-5';
                                $place_holder = 'Who is ___ ?';
                                break;
                        }
                        echo '
                            <h2>' .$category. ' $200</h2>
                            <h3>' .$question. '</h3>
                            <form method="post" id="form">
                                <label for="answer"><b>Your answer.</b></label>
                                <input class="answer-input" type="text" name="' .$answer_name. '" placeholder="'.$place_holder.'" required="">
                                <button class="submit-answer" name="submit_row1" type="submit">Submit</button>
                            </form>
                        ';
                    }
                }

                /*For row 2*/
                for ($i=1; $i<=5; $i++) {
                    if (isset($_GET['quest2-' .$i]) && $_GET['quest2-' .$i] == 1) {
                        if (isset($_POST['submit_row2'])) {
                            $_SESSION['current_dollar2-' .$i] = $_SESSION['dollar'];
                            $_SESSION['prev_dollar2-' .$i] = $_SESSION['prev_dollar'];
                            $_SESSION['check2-' .$i] = true;
                            header("location: index.php");
                        }
                        switch ($i) {
                            case 1:
                                $category = 'History';
                                $question = 'In what year was the first microprocessor invented?';
                                $answer_name = 'answer2-1';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 2:
                                $category = 'Science';
                                $question = 'What is the name of the markup language used to create web pages, which is
                                used to define the structure and content of a web page?';
                                $answer_name = 'answer2-2';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 3:
                                $category = 'Sports';
                                $question = 'What is the name of the American football championship game played annually
                                between the winners of the AFC and NFC?';
                                $answer_name = 'answer2-3';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 4:
                                $category = 'Geography';
                                $question = 'What is the name of the largest desert in the world, covering much of Northern
                                Africa? ';
                                $answer_name = 'answer2-4';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 5:
                                $category = 'Art & Artiest';
                                $question = 'Who painted the Starry Night?';
                                $answer_name = 'answer2-5';
                                $place_holder = 'Who is ___ ?';
                                break;
                        }
                        echo '
                            <h2>' .$category. ' $400</h2>
                            <h3>' .$question. '</h3>
                            <form method="post" id="form">
                                <label for="answer"><b>Your answer.</b></label>
                                <input class="answer-input" type="text" name="' .$answer_name. '" placeholder="'.$place_holder.'" required="">
                                <button class="submit-answer" name="submit_row2" type="submit">Submit</button>
                            </form>
                        ';
                    }
                }


                /*For row 3*/
                for ($i=1; $i<=5; $i++) {
                    if (isset($_GET['quest3-' .$i]) && $_GET['quest3-' .$i] == 1) {
                        if (isset($_POST['submit_row3'])) {
                            $_SESSION['current_dollar3-' .$i] = $_SESSION['dollar'];
                            $_SESSION['prev_dollar3-' .$i] = $_SESSION['prev_dollar'];
                            $_SESSION['check3-' .$i] = true;
                            header("location: index.php");
                        }
                        switch ($i) {
                            case 1:
                                $category = 'History';
                                $question = 'What was the first popular programming language created in 1957?';
                                $answer_name = 'answer3-1';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 2:
                                $category = 'Science';
                                $question = 'In computer networking, what does DNS stand for?';
                                $answer_name = 'answer3-2';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 3:
                                $category = 'Sports';
                                $question = 'In baseball, what is the term for the defensive player who stands behind home
                                plate and catches the pitches thrown by the pitcher?';
                                $answer_name = 'answer3-3';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 4:
                                $category = 'Geography';
                                $question = 'What is the capital city of Spain, known for its art, architecture, and football?';
                                $answer_name = 'answer3-4';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 5:
                                $category = 'Art & Artiest';
                                $question = 'What is the name of the most visited museum in Paris that is shaped like a glass
                                pyramid?';
                                $answer_name = 'answer3-5';
                                $place_holder = 'What is ___ ?';
                                break;
                        }
                        echo '
                            <h2>' .$category. ' $600</h2>
                            <h3>' .$question. '</h3>
                            <form method="post" id="form">
                                <label for="answer"><b>Your answer.</b></label>
                                <input class="answer-input" type="text" name="' .$answer_name. '" placeholder="'.$place_holder.'" required="">
                                <button class="submit-answer" name="submit_row3" type="submit">Submit</button>
                            </form>
                        ';
                    }
                }


                /*For row 4*/
                for ($i=1; $i<=5; $i++) {
                    if (isset($_GET['quest4-' .$i]) && $_GET['quest4-' .$i] == 1) {
                        if (isset($_POST['submit_row4'])) {
                            $_SESSION['current_dollar4-' .$i] = $_SESSION['dollar'];
                            $_SESSION['prev_dollar4-' .$i] = $_SESSION['prev_dollar'];
                            $_SESSION['check4-' .$i] = true;
                            header("location: index.php");
                        }
                        switch ($i) {
                            case 1:
                                $category = 'History';
                                $question = 'What is the name of the organization that sets standards for the World Wide Web,
                                including HTML, CSS, and other technologies?';
                                $answer_name = 'answer4-1';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 2:
                                $category = 'Science';
                                $question = 'What is the name of the process used to test software for defects or errors before
                                it is released to the public?';
                                $answer_name = 'answer4-2';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 3:
                                $category = 'Sports';
                                $question = 'What is the name of the international soccer club competition featuring the best
                                teams from across Europe?';
                                $answer_name = 'answer4-3';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 4:
                                $category = 'Geography';
                                $question = 'What is the name of the longest river in Africa, flowing through ten countries
                                before emptying into the Mediterranean Sea?';
                                $answer_name = 'answer4-4';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 5:
                                $category = 'Art & Artiest';
                                $question = 'Who created the first computer-generated piece of art in 1963?';
                                $answer_name = 'answer4-5';
                                $place_holder = 'Who is ___ ?';
                                break;
                        }
                        echo '
                            <h2>' .$category. ' $800</h2>
                            <h3>' .$question. '</h3>
                            <form method="post" id="form">
                                <label for="answer"><b>Your answer.</b></label>
                                <input class="answer-input" type="text" name="' .$answer_name. '" placeholder="'.$place_holder.'" required="">
                                <button class="submit-answer" name="submit_row4" type="submit">Submit</button>
                            </form>
                        ';
                    }
                }


                /*For row 5*/
                for ($i=1; $i<=5; $i++) {
                    if (isset($_GET['quest5-' .$i]) && $_GET['quest5-' .$i] == 1) {
                        if (isset($_POST['submit_row5'])) {
                            $_SESSION['current_dollar5-' .$i] = $_SESSION['dollar'];
                            $_SESSION['prev_dollar5-' .$i] = $_SESSION['prev_dollar'];
                            $_SESSION['check5-' .$i] = true;
                            header("location: index.php");
                        }
                        switch ($i) {
                            case 1:
                                $category = 'History';
                                $question = 'What is the name of the programming language used to create dynamic web
                                pages, which was created by Brendan Eich in 1995 and was originally called Mocha?';
                                $answer_name = 'answer5-1';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 2:
                                $category = 'Science';
                                $question = 'What is the name of the framework developed by Google for building web
                                applications using HTML, CSS, and JavaScript?';
                                $answer_name = 'answer5-2';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 3:
                                $category = 'Sports';
                                $question = 'What is the name of the horse race that takes place annually on the first
                                Saturday in May in Louisville, Kentucky?';
                                $answer_name = 'answer5-3';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 4:
                                $category = 'Geography';
                                $question = 'What is the capital city of Australia, located on the southeast coast?';
                                $answer_name = 'answer5-4';
                                $place_holder = 'What is ___ ?';
                                break;
                            case 5:
                                $category = 'Art & Artiest';
                                $question = 'What is the name of the process used to create photorealistic 3D images and
                                animations, often used in movies and video games?';
                                $answer_name = 'answer5-5';
                                $place_holder = 'What is ___ ?';
                                break;
                        }
                        echo '
                            <h2>' .$category. ' $1000</h2>
                            <h3>' .$question. '</h3>
                            <form method="post" id="form">
                                <label for="answer"><b>Your answer.</b></label>
                                <input class="answer-input" type="text" name="' .$answer_name. '" placeholder="'.$place_holder.'" required="">
                                <button class="submit-answer" name="submit_row5" type="submit">Submit</button>
                            </form>
                        ';
                    }
                }
            ?>

        </div>
    </div>
</body>

</html>