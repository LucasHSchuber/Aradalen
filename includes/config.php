<?php 

// starta session
session_start();

// $site_title
global $pageTitle;
$pageTitle['page1'] = "Index";
$pageTitle['page2'] = "Inventory";
$pageTitle['page3'] = "Lista";

// $divider 

// ladda klasser
spl_autoload_register(function($class_name) {
    include 'classes/' . $class_name . '.class.php'; // sökväg till mapparna för klasserna
});

//utvecklarläge
$devmode = true;

if ($devmode) { // om $devmode = true;

    // Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);

    //databasinställningar

    // define("DBHOST", "localhost");
    // define("DBUSER", "root");
    // define("DBPASSWORD", "root");
    // define("DBDATABASE", "blogsdb");

    
} else{
    //databasinsätllningar - publicerat
}
