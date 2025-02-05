<?php
session_start();
if (isset($_SESSION['User']) || isset($_SESSION['Admin'])){
    header("Location: ../vista/lista_socios.php");
    exit();
} else{
    header("Location: ../vista/logout.php");
    exit();
}