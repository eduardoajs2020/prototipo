<?php

require_once('conexaoBd.php');
require_once('functionDAO.php');


class Controller {

    private $FunctionDAO;

    public function __construct() {

        $this->FunctionDAO = new FunctionDAO(Conection::getConnection());

    }

    public function criarFluxo ($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento) {

        return $this->FunctionDAO->createDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);

    }

    public function buscarFluxo($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento) {

        return $this->FunctionDAO->readDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);

    }

    public function atualizarFluxo($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento) {

        return $this->FunctionDAO->updateDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento);

    }

    public function deletarFluxo($id) {

       return $this->FunctionDAO->destroyDados($id);

    }
}

?>