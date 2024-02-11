<?php 

class CalculaTributo{

}
    $produto        =   $_POST['produto'];
    $quantidade     =   $_POST['quantidade'];
    $valorProduto   =   $_POST['valorProduto'];
    $estado         =   $_POST['estado'];
    $substituicao   =   $_POST['substituicao'];

    $estadosAliquotas = [
                            "AC" => 0.17,  # Acre
                            "AL" => 0.17,  # Alagoas
                            "AP" => 0.18,  # Amapá
                            "AM" => 0.18,  # Amazonas
                            "BA" => 0.18,  # Bahia
                            "CE" => 0.18,  # Ceará
                            "DF" => 0.18,  # Distrito Federal
                            "ES" => 0.17,  # Espírito Santo
                            "GO" => 0.17,  # Goiás
                            "MA" => 0.18,  # Maranhão
                            "MT" => 0.17,  # Mato Grosso
                            "MS" => 0.17,  # Mato Grosso do Sul
                            "MG" => 0.18,  # Minas Gerais
                            "PA" => 0.17,  # Pará
                            "PB" => 0.18,  # Paraíba
                            "PR" => 0.18,  # Paraná
                            "PE" => 0.18,  # Pernambuco
                            "PI" => 0.18,  # Piauí
                            "RJ" => 0.20,  # Rio de Janeiro
                            "RN" => 0.18,  # Rio Grande do Norte
                            "RS" => 0.18,  # Rio Grande do Sul
                            "RO" => 0.17,  # Rondônia
                            "RR" => 0.17,  # Roraima
                            "SC" => 0.17,  # Santa Catarina
                            "SP" => 0.18,  # São Paulo
                            "SE" => 0.18,  # Sergipe
                            "TO" => 0.18   # Tocantins
    ];


function calculaSubstituicaoTributaria($estado, $substituicao, $estadosAliquotas){

    if ($substituicao == '1') {

        return $estadosAliquotas[$estado] *= 0.30;

    } else {

        return $estadosAliquotas[$estado] ++;

    }
}


function calculaIcms($estado, $valorProduto, $quantidade, $estadosAliquotas){

    return ($valorProduto * $quantidade * $estadosAliquotas[$estado]);
}

function tributoArecolher($substituicao, $resultado, $resultado2){

        if( $substituicao == '1') {

        return $resultado + ($resultado * $resultado2);
    } 
        else{

        return $resultado;

    }
}


$resultado      =   calculaIcms($estado, $valorProduto, $quantidade, $estadosAliquotas); 
$resultado2     =   calculaSubstituicaoTributaria($estado, $substituicao, $estadosAliquotas);
$recolhimento   =   tributoArecolher($substituicao, $resultado, $resultado2);

echo '<br> O Valor base do ICMS é: R$ ', number_format($resultado,2);
echo '<br> O percentual da substituição é: ', $resultado2;
echo '<br> O valor a recolher será: R$ ', number_format($recolhimento,2);

$data = array(
    array(
        "resultado"   => number_format($resultado,2),
        "substituicao"  => $resultado2,
        "recolhimento"=> number_format($recolhimento,2)
    )
);

$arquivoSaida = 'data.json';
$json = json_encode($data);

$file = fopen(__DIR__ . '/' . $arquivoSaida, 'w');
fwrite($file, $json);
fclose($file);

?>

<link rel="stylesheet" href="styles.css">;
