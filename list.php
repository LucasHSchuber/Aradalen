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

        <table class="form">
            <tr class="form">
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
                        <tr class='form'>
                            <td>" . $inventory['product'] . "</td>
                            <td>" . $inventory['amount'] .  "</td>
                            <td>" . $inventory['sort'] . "</td>
                            <td> <a href='list.php?delete=" . $inventory['id'] . "'> <i class='fa-solid fa-minus'></i></a> </td>
                        </tr>
                    ";
                }
            }


            ?>

        </table>
        <div class="form">
            <?php
            // print all error messeges if success not true
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>

    </main>

    <footer>
        <?php
        include("includes/footer.php");
        ?>
    </footer>
</body>

</html>