<?php
$pages = array(
    "Lägg till" => "index.php",
    "Inventory" => "inventory.php",
    "Lista" => "list.php"
);
?>
<form method="POST" class="search">
    <input class="search-bar" type="text" id="search" name="search" placeholder="Sök..">
    <button class="search-btn" type="submit1"><a><i class="fa-solid fa-magnifying-glass"></i></a></button><br><br>
</form>

<div class="menu topnav" id="myTopnav">
    <?php
    foreach ($pages as $page => $page_filename) {
        $current = basename($_SERVER['SCRIPT_FILENAME']);
        if ($page_filename == $current) {
            echo "<a aria-label='link' value='link' href='$page_filename' class='active'>$page</a>\n";
        } else {
            echo "<a aria-label='link' value='link' href='$page_filename'>$page</a>\n";
        }
    }
    ?>

</div>