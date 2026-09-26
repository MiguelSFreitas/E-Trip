<?php
/**
 * dados_carros.php
 *
 * Base local com os dados técnicos dos carros elétricos do ETRIP.
 * Contém os 5 carros mais vendidos no Brasil em 2026 (segundo ABVE).
 *
 * IMPORTANTE:
 * Os valores de bateria_kwh, consumo_kwh_km e autonomia_km abaixo são
 * ESTIMATIVAS iniciais (placeholders). O Paulo precisa CONFERIR cada
 * valor na ficha técnica oficial de cada carro antes da entrega final.
 *
 * Responsável: Miguel
 */

$carros = [
    [
        'id' => 1,
        'marca' => 'BYD',
        'modelo' => 'Dolphin Mini',
        'versao' => 'GS',
        'bateria_kwh' => 38.0,       // capacidade total da bateria
        'consumo_kwh_km' => 0.146,   // consumo médio (kWh por km)
        'autonomia_km' => 280,       // autonomia divulgada pelo fabricante
    ],
    [
        'id' => 2,
        'marca' => 'BYD',
        'modelo' => 'Dolphin',
        'versao' => 'GS',
        'bateria_kwh' => 44.9,
        'consumo_kwh_km' => 0.150,
        'autonomia_km' => 300,
    ],
    [
        'id' => 3,
        'marca' => 'Geely',
        'modelo' => 'EX2',
        'versao' => 'Padrão',
        'bateria_kwh' => 41.0,
        'consumo_kwh_km' => 0.140,
        'autonomia_km' => 301,
    ],
    [
        'id' => 4,
        'marca' => 'Chevrolet',
        'modelo' => 'Spark EUV',
        'versao' => 'Padrão',
        'bateria_kwh' => 42.2,
        'consumo_kwh_km' => 0.155,
        'autonomia_km' => 275,
    ],
    [
        'id' => 5,
        'marca' => 'BYD',
        'modelo' => 'Yuan Pro',
        'versao' => 'Padrão',
        'bateria_kwh' => 60.5,
        'consumo_kwh_km' => 0.160,
        'autonomia_km' => 370,
    ],
];

/**
 * Busca um carro pelo ID.
 * Retorna null se o carro não existir (o CalculoEnergia.php trata isso
 * lançando uma Exception dentro do try/catch).
 */
function buscarCarroPorId($carroId, $carros) {
    foreach ($carros as $c) {
        if ($c['id'] == $carroId) {
            return $c;
        }
    }
    return null;
}

/**
 * Retorna a lista de marcas únicas (sem repetir), para popular
 * o primeiro select em cascata no frontend.
 */
function listarMarcas($carros) {
    $marcas = array_unique(array_column($carros, 'marca'));
    sort($marcas);
    return array_values($marcas);
}

/**
 * Retorna os carros de uma marca específica, para popular
 * o segundo select (modelo) depois que a marca for escolhida.
 */
function listarModelosPorMarca($marca, $carros) {
    return array_values(array_filter($carros, fn($c) => $c['marca'] === $marca));
}
