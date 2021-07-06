<?php
require_once 'includes/__header.php';
?>


    <form action="/loginUser" method="post">

        <input type="text" name="user" placeholder="Username">
        <input type="text" name="password" placeholder="Password">

        <input type="submit" value="Submit">
    </form>



<?php
require_once 'includes/__footer.php';
?>