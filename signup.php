<?php
    if (!empty($_POST)) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $userID = [$_POST['username'], $_POST['password']];
            $handle = fopen('logins.csv', 'a');
            fputcsv($handle, $userID);
            fclose($handle);
            header("Location: login.html");
        }
    }
?>