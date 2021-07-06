<?php
require_once 'includes/__header.php';
?>


    <form action="registerUser" method="post">

        <input type="email" name="email" placeholder="Enter your email">
        <br>
        <input type="text" name="name" placeholder="Enter your username">
        <br>
        <input type="text" name="password_1" placeholder="Enter Password">
        <br>
        <input type="text" name="password_2" placeholder="Repeat Password">
        <br>
        <input type="submit" value="Submit">
    </form>



<?php
require_once 'includes/__footer.php';
?>