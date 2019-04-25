<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gameboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <nav id="navbar1">
            <h1 class="logo">
                Quiz Game
            </h1>
            <ul>
                <li><a href="leaderboard.php">Leaderboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section id="showcase">
        <div class="container">
            <div class="gameboard">
                <h1>Jeopardy</h1>
                <hr>
                <form action="question.php" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>HTML</th>
                                <th>CSS</th>
                                <th>PHP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>100<input id="html100" type="submit" value="html100" name="submit" ></td>  
                                <td>100<input id="css100" type="submit" value="css100" name="submit" ></td>
                                <td>100<input id="php100" type="submit" value="php100" name="submit" ></td>
                            </tr>
                            <tr>
                                <td>200<input id="html200" type="submit" value="html200" name="submit" ></td>
                                <td>200<input id="css200" type="submit" value="css200" name="submit" ></td>
                                <td>200<input id="php200" type="submit" value="php200" name="submit" ></td>
                            </tr>
                            <tr>
                                <td>300<input id="html300" type="submit"value="html300" name="submit" ></td>
                                <td>300<input id="css300" type="submit" value="css300" name="submit" ></td>
                                <td>300<input id="php300" type="submit" value="php300" name="submit" ></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><?php echo $_COOKIE['counter']; ?></td>
                                <th>Questions Attempted</th>
                            </tr>
                            <tr>
                                <th>Score Total</th>
                                <td colspan="2"><?php echo $_COOKIE['score_total']; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
