<?php

require_once('../utils/Conexao.php');
require_once('../dao/Fluxo_caixaDAO.php');


class Fluxo_caixaController {

    private $Fluxo_caixaDAO;

    public function __construct() {

        $this->Fluxo_caixaDAO = new Fluxo_caixaDAO(Conexao::getConnection());

    }

    public function criarFluxo($tipo, $valor, $data, $descricao) {

        return $this->Fluxo_caixaDAO->create($tipo, $valor, $data, $descricao);

    }

    public function buscarFluxo($tipo, $valor, $data, $descricao) {

        return $this->Fluxo_caixaDAO->read($tipo, $valor, $data, $descricao);

    }

    public function atualizarFluxo($id, $tipo, $valor, $data, $descricao) {

        return $this->Fluxo_caixaDAO->update($id, $tipo, $valor, $data, $descricao);

    }

    public function deletarFluxo($id) {

       return $this->Fluxo_caixaDAO->delete($id);

    }
}

?>