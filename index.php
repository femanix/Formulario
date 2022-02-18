<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Dev;

$listagem = Dev::getDevs();

$resultado = '';

foreach ($listagem as $lista) {
    $resultado .= '<tr>
                    <td>'.$lista->nome. '</td>
                    <td>'.$lista->email. '</td>
                    <td>'.$lista->habilidade. '</td>
                    <td>'.$lista->senioridade. '</td>
                    <td>
                        <a href="editar.php?id='.$lista->id.'">
                            <button type="button" class="btn btn-outline-primary me-3">Editar</buton>
                        </a>

                        <a href="excluir.php?id='.$lista->id.'">
                            <button type="button" class="btn btn-outline-danger ">Excluir</buton>
                        </a>
                    </td>
                  </tr>';
                  
};



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <title>Cadastro de Desenvolvedores</title>
  </head>
  <body class="bg-dark text-light">
  <div class="container">
    
    <div class=" " >
    <h1>Cadastro de Desenvolvedores</h1>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">
                Novo Desenvolvedor
            </button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3 table-striped table-bordered">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Habilidade</td>
                    <td>Senioridade</td>
                    <td>Açoes</td>
                </tr>
            </thead>
            <tbody>
                <?=$resultado?>
            </tbody>
        </table>
    </section>


  </body>
</html>