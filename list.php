<?php
include("includes/config.php");
?>
<?php

//checks if post is created 
if (isset($_SESSION['paymentcreated'])) {
    $_SESSION['paymentcreated'] = "<h4 class='success'>Utgiften har registrerats!</h4>";
}

?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <title><?php echo $pageTitl['3']; ?></title>

    <?php
    include("includes/head.php");
    ?>

</head>

<body>
    <header>
        <?php
        include("includes/nav.php");
        ?>
    </header>
    <main>

        <h1 class="title" style="padding:1em 0 1em 5%;">Lista</h1>


    </main>

    <footer>
        <?php
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>