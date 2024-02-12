<!DOCTYPE html>
<html>
<head>
    <title>CALCULADORA DE ICMS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</head>
<body>
    <br><br>
    <h1>Calculo da Alíquota de ICMS de acordo com o Estado</h1>
    <br><br>
    <form id="searchForm">
        <label for="produto">Produto:</label>
        <input type="text" id="produto" required>
        <br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" required>
        <br><br>
        <label for="valorProduto">Valor do Produto:</label>
        <input type="text" id="valorProduto" required>
        <br><br>
        <label for="estado">Estado da Federação:</label>
        <select id="estado" required>
            <option value="">Todas</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espirito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>

        <br><br>

        <label for="substituicao">Substituição Tributária:</label>
        <select id="substituicao">
            <option value="1">Sim</option>
            <option value="2">Não</option>
        </select>
        <br>
        <br>

    <div class="buttons" id="buttons">
        <input class="buttom" id="Pesquisar" type="submit" value="Pesquisar">
        <input class="buttom" name="CadSentenca" id="CadSentenca" type="submit" value="Cadastrar">
        <input class="buttom" name="AltSentenca" id="AltSentenca" type="submit" value="Alterar">
        <input class="buttom" name="DelSentenca" id="DelSentenca" type="submit" value="Excluir">
        <input class="buttom" name="ListaSentenca" id="ListaSentenca"type="submit" value="Lista Todas">
    </div>
    </form>

    <div id="resultado"></div>
     
    <script> 
    // Muda o estilo do elemento:
    

    let stBody = document.getElementById('searchForm');
        stBody.style.backgroundColor = 'blue';
        stBody.style.fontSize = '20px';
        stBody.style.fontFamily = 'arial';
        stBody.style.margin = '5px';
        stBody.style.padding = '20px';

    
        
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script>
        $(document).ready(function() {
            // Função para realizar a pesquisa
            $('#searchForm').submit(function(e) {
                e.preventDefault();

                let produto         = $('#produto').val();
                let quantidade      = $('#quantidade').val();
                let valorProduto    = $('#valorProduto').val();
                let estado          = $('#estado').val();
                let substituicao    = $('#substituicao').val();
                  
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {
                        produto: produto,
                        quantidade: quantidade,
                        valorProduto: valorProduto,
                        estado: estado,
                        substituicao: substituicao
                    },
                    success: function(response) {
                        $('#resultado').html(response);
                        alert("Sucesso na Execução!");
                    },
                    error: function() {
                        $('#resultado').html('Erro ao realizar a pesquisa.');
                    }
                    
                });
            });

            // Função para adicionar um novo registro
            $('#searchForm').submit(function(event) {
                event.preventDefault();
                
                let formData = {
                    id: $('#id').val(),
                    produto: $('#produto').val(),
                    quantidade: $('#quantidade').val(),
                    valorProduto: $('#valorProduto').val(),
                    estado: $('#estado').val(),
                    substituicao: $('#substituicao').val()
                    
                };

                $.ajax({
                    url: 'controller.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function() {
                        loadRecords();
                        $('#id, #produto, #quantidade, #valorProduto, #estado, #substituicao').val('');
                    },
                    error: function(error) {
                        console.error('Erro ao adicionar registro:', error);
                    }
                });
            });

            // Função para carregar registros
            function loadRecords() {
                $.ajax({
                    url: 'controller.php',
                    type: 'GET',
                    success: function(records) {
                        $('#ListaSentenca').empty();
                        records.forEach(function(record) {
                            $('#ListaSentenca').append('<li>' + record.name + ': ' + record.description + '</li>');
                        });
                    },
                    error: function(error) {
                        console.error('Erro ao carregar registros:', error);
                    }
                });
            }

            // Inicialização da página carregando os registros
            $(document).ready(function() {
                loadRecords();
            });
        });
    </script>
    
    <link rel="stylesheet" href="styles.css">
</body>
</html>