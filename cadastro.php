<?php
session_start();

include_once('../routes/ClientesController.php');
require_once('../utils/Conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"] ?? null;
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];


    $clientesController = new ClientesController();

    // Chamada dos métodos do ClientesController

    $CadSentenca = filter_input(INPUT_POST, 'CadSentenca');

    if (isset ($CadSentenca)) {

        $clientesController->criarCliente($id, $nome, $cpf, $email, $telefone, $endereco);
    }

    $ListaSentenca = filter_input(INPUT_POST, 'ListaSentenca');

    if (isset ($ListaSentenca)) {

        $clientesController->buscarCliente($id, $nome, $cpf, $email, $telefone, $endereco);
    }

    $AltSentenca = filter_input(INPUT_POST, 'AltSentenca');

    if (isset($AltSentenca)) {

         $clientesController->atualizarCliente($id, $nome, $cpf, $email, $telefone, $endereco);
    }

    $DelSentenca = filter_input(INPUT_POST, 'DelSentenca');

    if (isset ($DelSentenca)) {

        $clientesController->deletarCliente($id);
    }

}

?>