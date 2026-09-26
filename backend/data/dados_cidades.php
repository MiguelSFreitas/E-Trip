<?php
/**
 * dados_cidades.php
 *
 * Base local de cidades e distâncias do Espírito Santo.
 * Substitui a chamada à API de rotas, eliminando a dependência
 * de internet no dia da feira.
 *
 * A lista segue o trajeto da BR-101, norte -> sul:
 * Pinheiros, São Mateus, Linhares, Ibiraçu, Serra, Vitória, Vila Velha.
 *
 * IMPORTANTE:
 * Os valores de distância (km) e tempo (min) abaixo são ESTIMATIVAS iniciais.
 * O Paulo precisa CONFERIR cada valor no Google Maps antes da entrega final
 * e corrigir o que estiver impreciso.
 */

// Lista de cidades disponíveis no sistema
$cidades = [
    'Pinheiros',
    'São Mateus',
    'Linhares',
    'Ibiraçu',
    'Serra',
    'Vitória',
    'Vila Velha',
];

// Distância e tempo estimado de carro entre pares de cidades.
// Cada linha é uma via (origem -> destino). A função buscarDistancia() abaixo
// verifica os dois sentidos, então não é necessário duplicar (A->B e B->A).
$distancias = [
    // Trajeto principal pela BR-101 (norte -> sul)
    ['origem' => 'Pinheiros',  'destino' => 'São Mateus', 'distancia_km' => 55,  'tempo_min' => 55],
    ['origem' => 'São Mateus', 'destino' => 'Linhares',   'distancia_km' => 80,  'tempo_min' => 75],
    ['origem' => 'Linhares',   'destino' => 'Ibiraçu',    'distancia_km' => 70,  'tempo_min' => 65],
    ['origem' => 'Ibiraçu',    'destino' => 'Serra',      'distancia_km' => 35,  'tempo_min' => 35],
    ['origem' => 'Serra',      'destino' => 'Vitória',    'distancia_km' => 27,  'tempo_min' => 35],
    ['origem' => 'Vitória',    'destino' => 'Vila Velha', 'distancia_km' => 10,  'tempo_min' => 20],

    // Rotas longas, combinando trechos não consecutivos do trajeto
    ['origem' => 'Pinheiros',  'destino' => 'Linhares',   'distancia_km' => 135, 'tempo_min' => 125],
    ['origem' => 'Pinheiros',  'destino' => 'Ibiraçu',    'distancia_km' => 205, 'tempo_min' => 185],
    ['origem' => 'Pinheiros',  'destino' => 'Serra',      'distancia_km' => 240, 'tempo_min' => 215],
    ['origem' => 'Pinheiros',  'destino' => 'Vitória',    'distancia_km' => 267, 'tempo_min' => 240],
    ['origem' => 'Pinheiros',  'destino' => 'Vila Velha', 'distancia_km' => 277, 'tempo_min' => 250],

    ['origem' => 'São Mateus', 'destino' => 'Ibiraçu',    'distancia_km' => 150, 'tempo_min' => 135],
    ['origem' => 'São Mateus', 'destino' => 'Serra',      'distancia_km' => 185, 'tempo_min' => 165],
    ['origem' => 'São Mateus', 'destino' => 'Vitória',    'distancia_km' => 212, 'tempo_min' => 190],
    ['origem' => 'São Mateus', 'destino' => 'Vila Velha', 'distancia_km' => 222, 'tempo_min' => 200],

    ['origem' => 'Linhares',   'destino' => 'Serra',      'distancia_km' => 105, 'tempo_min' => 95],
    ['origem' => 'Linhares',   'destino' => 'Vitória',    'distancia_km' => 133, 'tempo_min' => 120],
    ['origem' => 'Linhares',   'destino' => 'Vila Velha', 'distancia_km' => 143, 'tempo_min' => 130],

    ['origem' => 'Ibiraçu',    'destino' => 'Vitória',    'distancia_km' => 62,  'tempo_min' => 65],
    ['origem' => 'Ibiraçu',    'destino' => 'Vila Velha', 'distancia_km' => 72,  'tempo_min' => 75],

    ['origem' => 'Serra',      'destino' => 'Vila Velha', 'distancia_km' => 33,  'tempo_min' => 45],
];

/**
 * Busca a distância e tempo entre duas cidades, em qualquer sentido.
 * Retorna null se a combinação ainda não estiver cadastrada.
 */
function buscarDistancia($origem, $destino, $distancias) {
    foreach ($distancias as $d) {
        if (
            ($d['origem'] === $origem && $d['destino'] === $destino) ||
            ($d['origem'] === $destino && $d['destino'] === $origem)
        ) {
            return [
                'distancia_km' => $d['distancia_km'],
                'tempo_min'    => $d['tempo_min'],
            ];
        }
    }
    return null;
}

/**
 * Retorna a lista de cidades cadastradas (para popular os selects no frontend).
 */
function listarCidades($cidades) {
    return $cidades;
}