<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user = $_SESSION['user_id'];
        $score = $_COOKIE['score_total'];
        $leadersArray = array();
        

        if (($handle = fopen("leaderboard.csv", "a")) !== FALSE) {
            $lineInfo = [$_SESSION['user_id'], $_COOKIE['score_total']];
            $handle = fopen('leaderboard.csv', 'a');
            fputcsv($handle, $lineInfo);
            fclose($handle);
        }
    }
    $row = 0;
    if (($handle = fopen("leaderboard.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            
            for ($c=0; $c < $num; $c++) {
                $leadersArray[$row][$c] = $data[$c];
                // echo $leadersArray[$row][$c];
            }
            $row++;
        }
        fclose($handle);
        // print_r($leadersArray);
        // var_dump(intval(($leadersArray[2][1])));
        // echo count($leadersArray);

        for($i=0;$i<count($leadersArray);$i++) {
            $leadersArray[$i][1] = intval($leadersArray[$i][1]);
        }
        // var_dump($leadersArray);

        // array_multisort($leadersArray, SORT_NUMERIC);
        // var_dump($leadersArray);
        for ($i=0; $i < count($leadersArray); $i++) {
            $low = $i;
            for($j = $i + 1; $j < count($leadersArray); $j++) {
                if ($leadersArray[$j][1] > $leadersArray[$low][1]) {
                    $low = $j;
                }
            }

            if ($leadersArray[$i][1] < $leadersArray[$low][1]) {
                $tmp = $leadersArray[$i];
                $leadersArray[$i] = $leadersArray[$low];
                $leadersArray[$low] = $tmp;
            }
        }

        // print_r($leadersArray);

        // for($i=0; $i < count($leadersArray)-1; $i++) {
        //     echo $leadersArray[$i][0] . " " . $leadersArray[$i][1] . "<br />";
        // }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <nav id="navbar1">
            <h1 class="logo">
                Quiz Game
            </h1>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="leaderboard">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $count = 0;
                            for($i=0; $i < count($leadersArray)-1; $i++) {
                                echo "<tr><td>" . $leadersArray[$i][0]. "</td>";
                                echo "<td>" . $leadersArray[$i][1]. "</td></tr>";
                            }
                        ?>
                </tbody>
            </table>

        <a href="logout.php">Logout</a>
        </div>
        
    </div>
    

</body>
</html>
