<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <title><?php echo $pageTitl['2']; ?></title>

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

        <h1 class="title" style="padding:1em 0 1em 5%;">Inventory</h1>

        <table class="form-list">

            <tr class="">
                <th>Produkt:</th>
                <th>Mängd:</th>
                <th>Plats:</th>
                <th>Del:</th>
            </tr>

            <?php

            //instans av klassen
            $newinventory = new Newinventory();

            // raderar post
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];

                if ($newinventory->deleteProduct($id)) {
                }
            }



            $list = $newinventory->printAll();

            // echo "<pre>";
            // print_r($list);
            // echo "</pre>";

            if (count($list) === 0) {
                $_SESSION['msg'] = "<h4> Listan är tom </h4>";
            } else {
                foreach ($list as $inventory) {
                    echo "
                        <tr class=''>
                            <td>" . $inventory['product'] . "</td>
                            <td>" . $inventory['amount'] .  "</td>
                            <td>" . $inventory['sort'] . "</td>
                            <td> <a class='delete' href='list.php?delete=" . $inventory['id'] . "'> Ta bort &nbsp; <i class='fa-solid fa-minus'></i></a> </td>
                        </tr>
                    ";
                }
            }


            ?>

        </table>
        <div class="form-list">
            <?php
            // print all error messeges if success not true
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>

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
                    
                        <tr class='form-list'>
                            <td>" . $inventory['product'] . "</td>
                            <td>" . $inventory['amount'] .  "</td>
                            <td>" . $inventory['sort'] . "</td>
                            <td> <a class='delete' href='list.php?delete=" . $inventory['id'] . "'>Ta bort &nbsp;  <i class='fa-solid fa-minus'></i></a> </td>
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