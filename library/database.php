<?php
    function connect_database(){
        $server="localhost";
        $username="root";
        $password="";
        $database="BestPoint";
        $connection=new mysqli($server,$username,$password,$database);
        return $connection;
    }
?>
