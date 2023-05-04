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
    <title><?php echo $pageTitl['1']; ?></title>

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
        <h1 class=""  style="padding-bottom:1em;">Lägg till</h1>

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
                $amount = str_replace(' ', '', $_POST['amount']);
                $sort = $_POST['sort'];

                if ($newinventory->addInventory($product, $amount, $sort)) {
                    //if true

                }
            }


            ?>

            <input class="input-form year" type="text" name="product" id="product" placeholder="Produkt"><br><br>
            <input class="input-form year" type="text" name="amount" id="amount" placeholder="g/dl"><br><br>
            <div class="select-div">
                <div>
                    <select name="sort" id="sort">
                        <option value="Kylt">Kylt</option>
                        <option value="Torrt">Torrt</option>
                    </select>
                </div>
            </div><br>
            <button class="add-btn" type="submit"><a>Lägg till &nbsp;<i class="fa-solid fa-plus"></i></a></button><br><br>
            <hr>
        </form>

        <?php
        //instans av klassen
        $newinventory = new Newinventory();


        if (isset($_POST['search']) && $_POST['search'] != "") {
            $search = $_POST['search'];

            $list = $newinventory->findSearch($search);

            if (count($list) === 0) {
                echo "<h4 style='padding:0 0 1em 5%;'> Det finns ingen '" . $search . "'.</h4>";
            } else {
                echo "
                <h3 class='title' style='padding:0 0 1em 5%;'>Sökresultat:</h3>
                <table class='form-list'>
                    <tr class='form'>
                     <th>Produkt:</th>
                     <th>Mängd:</th>
                     <th>Plats:</th>
                    <th>Del:</th>
                  </tr>";
                foreach ($list as $inventory) {
                    echo "
                    
                        <tr class='form'>
                            <td>" . $inventory['product'] . "</td>
                            <td>" . $inventory['amount'] .  "</td>
                            <td>" . $inventory['sort'] . "</td>
                            <td> <a class='delete' href='list.php?delete=" . $inventory['id'] . "'> Ta bort &nbsp; <i class='fa-solid fa-minus'></i></a> </td>
                        </tr>
                  
                    ";
                }
                echo " </table>  ";
            }
        }

        ?>
    </main>

    <footer>
        <?php
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>