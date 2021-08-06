<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quantox Task</title>

</head>
<body>

<nav>

    <ul >
        <li style="display: inline"><a href="index.php">Home</a></li>


        <?php if (!isset($_SESSION['logged_in'])) : ?>

        <li style="display: inline"><a href="index.php?module=home&option=showLoginForm">Login</a></li>
        <li style="display: inline"><a href="index.php?module=home&option=showRegisterForm">Register</a></li>

        <?php else: ?>
            <li style="display: inline"><a href="index.php?module=user&option=logout">Logout</a></li>
        <?php endif ?>

        <form style="display: inline" action="index.php?module=home&option=showResults" method="post">
            <input type="text" name="search" placeholder="Search username or email">
            <input type="submit" value="Search">

        </form>

    </ul>

</nav>



