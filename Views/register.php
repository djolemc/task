<?php
require_once 'includes/__header.php';
?>


    <form action="registerUser" method="post">

        <input required type="email" name="email" placeholder="Enter your email">
        <br>
        <input required type="text" name="name" placeholder="Enter your name">
        <br>
        <input required type="password" name="password_1" placeholder="Enter Password">
        <br>
        <input required type="password" name="password_2" placeholder="Repeat Password">
        <br>
        <input type="submit" value="Submit">
    </form>



<?php
require_once 'includes/__footer.php';
?>