<?php
require_once 'includes/__header.php';
?>


    <form action="loginUser" method="post">

        <input type="text" name="email" placeholder="Enter your email">
        <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br>
        <input type="submit" value="Submit">
    </form>


<?php

if (isset($_SESSION['msg'])) {
    echo "<h3>".$_SESSION['msg']."</h3>";
}

require_once 'includes/__footer.php';
?>