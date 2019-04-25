<?php
    $questionID = $_POST['submit'];

    if (preg_match('/100/', $questionID) == 1) {
        $questionDifficulty = 100;
    } elseif (preg_match('/200/', $questionID) == 1){
        $questionDifficulty = 200;
    } else {
        $questionDifficulty = 300;
    }
    // echo $questionDifficulty . "<br />";

    $questionType = strtoupper(substr($questionID, 0, -3));

    // echo $questionType;\

    $questionContents = [[]];
    $row = 0;
    if (($handle = fopen("questions.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            // echo "<p> $num fields in line $row: <br /></p>\n";
            // $row++;
            // for ($c=0; $c < $num; $c++) {
            //     echo $data[$c] . "<br />\n";
            // }
            
            if ($data[0] == $questionType && $data[1] == $questionDifficulty) {
                for ($c=0; $c < $num; $c++) {
                    for($line=0; $line < 3; $line++)    
                        $questionContents[$row][$c] = $data[$c];
                        // echo $questionContents[$row][$c] . "<br />";
                }
                $row++;    
            }
        }
    }
    fclose($handle);
    // print_r($questionContents);
    // echo "<br />";
    // echo $questionContents[1][2];

    $seed = mt_rand(0,2);

    $question = $questionContents[$seed][2];
    $answer = $questionContents[$seed][3];

    $answerChoices = [$answer, $questionContents[$seed][4], $questionContents[$seed][5], $questionContents[$seed][6]];

    shuffle($answerChoices);

    // echo $question . "<br />";
    // foreach($answerChoices as $choices) {
    //     echo $choices . "<br />";
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <nav id="navbar">
        <h1 class="logo">
            Quiz Game
        </h1>
        <ul>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </nav>

    <div class="container2">
        <div class="gamequestion">
            <form action="questionprocessor.php" method="POST">
                <fieldset>
                    <legend><?php echo $question; ?></legend>
                    <div class="answergroup">
                        <input type="radio" id="A" name="answer" value="<?php echo $answerChoices[0]; ?>" checked>
                        <label for="A"><?php echo $answerChoices[0]; ?></label>
                        <hr>
                    </div>
                
                    <div class="answergroup">
                        <input type="radio" id="B" name="answer" value="<?php echo $answerChoices[1]; ?>">
                        <label for="A"><?php echo $answerChoices[1]; ?></label>
                        <hr>
                    </div>
                    <div class="answergroup">
                        <input type="radio" id="C" name="answer" value="<?php echo $answerChoices[2]; ?>">
                        <label for="A"><?php echo $answerChoices[2]; ?></label>
                        <hr>
                    </div>
                    <div class="answergroup">
                        <input type="radio" id="D" name="answer" value="<?php echo $answerChoices[3]; ?>">
                        <label for="A"><?php echo $answerChoices[3]; ?></label>
                        <input type="hidden" name="scoreValue" value="<?php echo $questionDifficulty; ?>">
                        <input type="hidden" name="correctAnswer" value="<?php echo $answer; ?>">
                        <button>Submit</button>
                    </fieldset>
                    
                
            </div>
            
    </form>
        </div>
        
    </div>
    
</body>
</html>

