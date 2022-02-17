<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Dev;

$objDev = new Dev;



if(isset($_POST['nome'],$_POST['email'],$_POST['senioridade'],$_POST['devweb'])){

    $objDev->nome = $_POST['nome'];
    $objDev->email = $_POST['email'];    
    $objDev->devweb = $_POST['devweb'];
    $objDev->senioridade = $_POST['senioridade'];

    $objDev->cadastrar();





};

include __DIR__.'/includes/formulario.php';