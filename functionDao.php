<?php 

require_once('conexaoBd.php');


class ConectionsDao{

    private $connection;
    public function __construct($connection){
    $this->connection = $connection;
    }

}




function createDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento){

     $sql = "INSERT INTO produtos (   produto
                                    , quantidade
                                    , valorProduto
                                    , estado
                                    , substituicao
                                    , recolhimento
                                    )
                            VALUES (  :produto
                                    , :quantidade
                                    , :valorProduto
                                    , :estado
                                    , :substituicao
                                    , :recolhimento
                                    )";

    $stmt = $this->connection->prepare($sql);

    $stmt->bindParam(":produto", $produto);

    $stmt->bindParam(":quantidade", $quantidade);

    $stmt->bindParam(":valorProduto", $valorProduto);

    $stmt->bindParam(":estado", $estado);

    $stmt->bindParam(":substituicao", $substituicao);

    $stmt->bindParam(":recolhimento", $recolhimento);

    if ($stmt->execute()) {

        echo "Produto cadastrado com sucesso!";

    } else {

        echo "Erro ao cadastrar produto: " . $stmt->errorInfo()[2];
        
    }
}



function readDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento){
    

    // Lógica para ler um registro do banco de dados

        $sql = "SELECT * FROM produtos";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        require_once '../index.php';
?>
        <link rel="StyleSheet" href="styles.css">
        <table class="cabecalho">
        <tr>
        <th><strong>NUMERO</strong></th>
        <th><strong>PRODUTO</strong></th>
        <th><strong>QUANTIDADE</strong></th>
        <th><strong>VALOR DO PRODUTO</strong></th>
        <th><strong>ESTADO</strong></th>
        <th><strong>SUBSTITUICAO</strong></th>
        <th><strong>RECOLHIMENTO</strong></th>
        </tr>

<?php        foreach ($result as $row) {

            $id = $row['id'];
            $produto = $row['produto'];
            $quantidade = $row['quantidade'];
            $valorProduto = $row['valorProduto'];
            $estado = $row['estado'];
            $substituicao = $row['substituicao'];
            $recolhimento = $row['recolhimento'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$produto</td>";
            echo "<td>$quantidade</td>";
            echo "<td>$valorProduto</td>";
            echo "<td>$estado</td>";
            echo "<td>$substituicao</td>";
            echo "<td>$recolhimento</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {

        return null;

    }
}



function updateDados($produto, $quantidade, $valorProduto, $estado, $substituicao, $recolhimento){

    // Lógica para atualizar um registro no banco de dados

    $sql = "UPDATE clientes SET 
                                produto = :produto
                              , quantidade = :quantidade
                              , valorProduto = :valorProduto
                              , estado = :estado
                              , substituicao = :substituicao
                              , recolhimento = :recolhimento
                              
                              WHERE id = :id";

    $stmt = $this->connection->prepare($sql);

    $stmt->bindParam(":produto", $produto);

    $stmt->bindParam(":quantidade", $quantidade);

    $stmt->bindParam(":valorProduto", $valorProduto);

    $stmt->bindParam(":estado", $estado);

    $stmt->bindParam(":substituicao", $substituicao);

    $stmt->bindParam(":recolhimento", $recolhimento);

    if ($stmt->execute()) {

        echo "Produto atualizado com sucesso!";

    } else {

        echo "Erro ao atualizar produto: " . $stmt->errorInfo()[2];
    }

}




function destroyDados($id){

    // Lógica para deletar um registro do banco de dados

        $sql = "DELETE FROM clientes WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {

        echo "Cliente deletado com sucesso!";

    } else {
        
        echo "Erro ao deletar cliente: " . $stmt->errorInfo()[2];
        
    }

}





?>