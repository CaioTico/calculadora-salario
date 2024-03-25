<?php
// Obtém os dados do formulário
$nome = $_POST['nome'];
$semana1 = $_POST['semana1'];
$semana2 = $_POST['semana2'];
$semana3 = $_POST['semana3'];
$semana4 = $_POST['semana4'];
$total_mes = $_POST['total_mes'];

// Define os valores e percentuais
$salario_minimo = 1856.94;
$meta_semanal = 20000; // Meta semanal
$meta_mensal = 80000; // Meta mensal

// Inicializa as bonificações
$bonificacao_semanal = 0;
$bonificacao_mensal = 0;

// Calcula a bonificação sobre o valor das vendas de cada semana
if ($semana1 >= $meta_semanal) {
    $bonificacao_semanal += ($semana1 - $meta_semanal) * 0.05; // Calcula a bonificação apenas sobre o excedente
    $bonificacao_semanal += $meta_semanal * 0.01; // Adiciona a bonificação sobre a meta semanal
}
if ($semana2 >= $meta_semanal) {
    $bonificacao_semanal += ($semana2 - $meta_semanal) * 0.05; // Calcula a bonificação apenas sobre o excedente
    $bonificacao_semanal += $meta_semanal * 0.01; // Adiciona a bonificação sobre a meta semanal
}
if ($semana3 >= $meta_semanal) {
    $bonificacao_semanal += ($semana3 - $meta_semanal) * 0.05; // Calcula a bonificação apenas sobre o excedente
    $bonificacao_semanal += $meta_semanal * 0.01; // Adiciona a bonificação sobre a meta semanal
}
if ($semana4 >= $meta_semanal) {
    $bonificacao_semanal += ($semana4 - $meta_semanal) * 0.05; // Calcula a bonificação apenas sobre o excedente
    $bonificacao_semanal += $meta_semanal * 0.01; // Adiciona a bonificação sobre a meta semanal
}

// Verifica se todas as metas semanais foram atingidas
$metas_semanais_atingidas = $semana1 >= $meta_semanal && $semana2 >= $meta_semanal && $semana3 >= $meta_semanal && $semana4 >= $meta_semanal;

// Verifica se a meta mensal foi atingida
if ($metas_semanais_atingidas && $total_mes > $meta_mensal) {
    $excedente_mensal = $total_mes - $meta_mensal;
    $bonificacao_mensal = $excedente_mensal * 0.1;
}

// Calcula o salário final
$salario_final = $salario_minimo + $bonificacao_semanal + $bonificacao_mensal;

// Exibe o resultado
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resultado do Cálculo</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    <div class='result'>
        <h2>Resultado do Cálculo</h2>
        <p>Nome do Funcionário: $nome</p>
        <p>Salário Final: R$ " . number_format($salario_final, 2) . "</p>
    </div>
</body>
</html>";
?>
