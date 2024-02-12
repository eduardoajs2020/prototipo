<?php
session_start();

require_once('controller.php');
require_once('conexaoBd.php');

class Cadastro{

    private $cadastro;

    public function __construct() {

        $this->cadastro = new Cadastro(Conection::getConnection());

    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id             =   $_POST["id"] ?? null;
    $produto        =   $_POST['produto'];
    $quantidade     =   $_POST['quantidade'];
    $valorProduto   =   $_POST['valorProduto'];
    $estado         =   $_POST['estado'];
    $substituicao   =   $_POST['substituicao'];



    $cadastro = new Cadastro();

    // Chamada dos métodos do ClientesController

    $CadSentenca = filter_input(INPUT_POST, 'CadSentenca');

    if (isset ($CadSentenca)) {

        $controller->createDados($id, $produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);
    }

    $ListaSentenca = filter_input(INPUT_POST, 'ListaSentenca');

    if (isset ($ListaSentenca)) {

        $controller->readDados($id, $produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);
    }

    $AltSentenca = filter_input(INPUT_POST, 'AltSentenca');

    if (isset($AltSentenca)) {

         $controller->updateDados($id, $produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);
    }

    $DelSentenca = filter_input(INPUT_POST, 'DelSentenca');

    if (isset ($DelSentenca)) {

        $controller->destroyDados($id);
    }

}


?>