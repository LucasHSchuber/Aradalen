<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <title>Utgifter</title>

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
        <div class="form-createpost">
    
        </div>

        <table class="form">
            <tr>
                <th>Produkt:</th>
                <th>Mängd:</th>
                <th>Plats:</th>
                <th>Tid:</th>
                <th>Del:</th>
            </tr>

            <?php
        
            //instans av klassen
            $newinventory = new Newinventory();

             // raderar post
             if (isset($_GET['delete'])) {
                $id_payment = $_GET['delete'];

                if ($newinventory->deleteProduct($id)) {
                }
            }



            $list = $newinventory->printAll();

            // echo "<pre>";
            // print_r($list);
            // echo "</pre>";

            foreach ($list as $inventory) {
                echo "
                    <tr>
                        <td>" . $inventory['product'] . "</td>
                        <td>" . $inventory['amount'] .  "</td>
                        <td>" . $inventory['sort'] . "</td>
                        <td>" . $inventory['created'] . "</td>
                        <td> <a href='list.php?delete=" . $inventory['id'] . "'> <i class='fa-solid fa-minus'></i></a> </td>
                    </tr>
                ";
            }
            ?>

        </table>

    </main>

    <footer>
        <?php
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>