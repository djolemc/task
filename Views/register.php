<?php
require_once 'includes/__header.php';

?>

    <H3>Please enter your data to register</H3>
    <form action="index.php?module=user&option=registerUser" method="post">

        <input required type="text" name="email"
               value="<?php echo isset($_SESSION['old_user']) ? $_SESSION['old_user']['email'] : '' ?>"
               placeholder="Enter your email">
        <?php if (isset($_SESSION['mail_error'])) echo "<br>" . $_SESSION['mail_error'] ?>
        <br>
        <input
                value="<?php echo isset($_SESSION['old_user']) ? $_SESSION['old_user']['name'] : '' ?>"
                required type="text" name="name" placeholder="Enter your name">
        <br>
        <input required type="password" name="password_1" placeholder="Enter Password">
        <br>
        <input required type="password" name="password_2" placeholder="Repeat Password">
        <br>

        <br>
        <input type="submit" value="Submit">

        <?php if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {

                echo $error;
            }
        }

        ?>

    </form>


<?php


require_once 'includes/__footer.php';
?>