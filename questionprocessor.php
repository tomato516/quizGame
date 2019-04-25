<?php
    $answer = $_POST['answer'];
    $correctAnswer = $_POST['correctAnswer'];
    $scoreValue = intval($_POST['scoreValue']);
    $scoreTotal = intval($_COOKIE['score_total']);

    $counter = intval($_COOKIE['counter']);
    echo $counter;
    $counter++;
    setcookie("counter", strval($counter));

    if($counter >= 6){
        header("Location: leaderboard.php");
        exit();
    }

    if($answer == $correctAnswer) {
        $scoreTotal += $scoreValue;
        setcookie("score_total", strval($scoreTotal));
        header("Location: gameboard.php");
        exit();
    } else
    header("Location: gameboard.php");
    exit();
    
    