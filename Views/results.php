<?php

require_once 'includes/__header.php';




if (isset($_SESSION['msg'])) {
    echo "<h3>".$_SESSION['msg']."</h3>";
    unset($_SESSION['msg']);
}

?>


<table id="test">

    <thead>
        <tr>
            <td>User Name</td>
            <td>User Email</td>

        </tr>
    </thead>
    <tbody>

    <?php foreach ($_SESSION['result'] as $result) : ?>

    <tr>
        <td><?php echo $result['name']?></td>
        <td><?php echo $result['email']?></td>
    </tr>


    <?php endforeach; ?>


    </tbody>

</table>

<?php
require_once 'includes/__footer.php';
