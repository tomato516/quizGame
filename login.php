<?php

session_start();
setcookie("score_total", "0");
setcookie("counter", "0");
$notlogged = 0;
if (!empty($_POST)) {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    
        $row = 0;
        // echo "hello" . "<br />";
        if (($handle = fopen("logins.csv", "r")) !== FALSE) {
            // echo "goodbye" . "<br />";
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // echo "hello2" . "<br />";
                $num = count($data);
                if($username == $data[0]) {
                    // echo "goodbye2" . "<br />";
                    // echo $password . "<br />";
                    // echo $data[1] . "<br />";
                    // var_dump($password);
                    // var_dump($data[1]);
                    if(strcmp($password, $data[1]) == 0) {
                        // echo "hello3" . "<br />";
                        $_SESSION['user_id'] = $_POST['username'];
                        header("Location: gameboard.php");
                        exit();
                    }
                }
                echo "<link rel=\"stylesheet\" href=\"style.css\" />";
                echo "<a id=\"failed\"href=\"login.html\">Login failed</a>";
                break;
            }
        }
    }
}
?>





