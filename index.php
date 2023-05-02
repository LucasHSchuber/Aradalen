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
    <title>Index</title>

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

        <form method="POST" class="form">
            <h1 class="title">Inventory</h1>
            <?php

            // // print all error messeges if success not true
            // if (isset($_SESSION['paymentcreated'])) {
            //     echo $_SESSION['paymentcreated'];
            //     unset($_SESSION['paymentcreated']);
            // }

            // // raderar ALLT
            // if (isset($_GET['deleteAll'])) {

            //     if ($newpayment->deleteAll()) {
            //     }
            // }

            //instans av klassen
            $newinventory = new Newinventory();

            if (!empty($_POST['product'])) {

                $product = $_POST['product'];
                $amount = (int)$_POST['amount'];
                $sort = $_POST['sort'];

                if ($newinventory->addInventory($product, $amount, $sort)) {
                    //if true

                }
            }


            ?>

            <input class="input-form year" type="text" name="product" id="product" placeholder="Produkt">
            <input class="input-form year" type="text" name="amount" id="amount" placeholder="g/dl">
            <div class="select-div">
                <div>
                    <select name="sort" id="sort">
                        <option value="cold">Kylt</option>
                        <option value="dry">Torrt</option>
                    </select>
                </div>
            </div>
            <button class="add-btn" type="submit"><a>Lägg till &nbsp;<i class="fa-solid fa-plus"></i></a></button><br><br>
            <hr>
        </form>

        <form method="POST" class="form-createpost">
            <button class="bomb-btn" type="submit" value="Submit" name="submit"><a><i class="fa-solid fa-bomb"></i></a></button><br><br>
        </form>
    </main>

    <footer>
        <?php
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>