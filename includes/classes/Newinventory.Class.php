<?php

class Newinventory
{

    //properties
    private $db;
    private $product;
    private $amount;
    private $sort;

    //constructor
    function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'root', 'inventorydb');
        if ($this->db->connect_errno > 0) {
            die('fel vid anslutning till databasen: ' . $this->db->connect_error);
        }
    }

    //set inventory
    public function setInventory(string $product, string $amount): bool
    {
        if ($product != "" && $amount != "") {
            $this->product = $product;
            $this->amount = $amount;
            return true;
        } else {
            return false;
        }
    }


    // add post
    public function addInventory(string $product, string $amount, string $sort): bool
    {

        //sanitera med real_escape_string
        $product = $this->db->real_escape_string($product);
        $amount = $this->db->real_escape_string($amount);
        $sort = $this->db->real_escape_string($sort);

        //SQL fråga
        $sql = "INSERT INTO inventory(sort, amount, product)VALUES('$sort', '$amount', '$product');";
        $this->db->query($sql);
        $_SESSION['added'] = "Den har lagts till!";
        header("location: index.php");
        return true;
    }


    //print payments
    public function getInventory(): array
    {
        // $sql = "SELECT price FROM payments WHERE name='Lucas';";
        $sql = "SELECT * FROM inventory;";
        $result = $this->db->query($sql); //lagrar svaret från servern i $result

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC); // lagrar i associativ array så det blir lättare att skriva ut på sidan
        }
    }

    //print all in list.php
    public function printAll(): array
    {
        $sql = "SELECT * FROM inventory ORDER BY created DESC;";
        $result = $this->db->query($sql); //lagrar svaret från servern i $result
        return mysqli_fetch_all($result, MYSQLI_ASSOC); // lagrar i associativ array så det blir lättare att skriva ut på sidan
    }





    //delete payment
    public function deleteProduct(string $id): bool
    {
        $sql = "DELETE FROM inventory WHERE id=$id;";
        return $this->db->query($sql);
        header("location: index.php");
        return true;
    }
    // delete ALL
    public function deleteAll(): bool
    {
        $sql = "DELETE FROM inventory;";
        return $this->db->query($sql);
        header("location: index.php");
        return true;
    }



    //destructor
    function __destruct()
    {
        $this->db->close();
    }
}
