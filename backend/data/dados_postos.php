<?php
/**
 * dados_postos.php
 *
 * Base local com os postos de recarga reais do Espírito Santo.
 * Os dados devem ser pesquisados manualmente no site do Open Charge Map
 * (openchargemap.org) e preenchidos abaixo — sem precisar integrar a API.
 *
 * Como pesquisar:
 * 1. Acesse openchargemap.org
 * 2. Busque/filtre pelo mapa a região do Espírito Santo
 * 3. Clique em cada posto encontrado e copie: nome, cidade, endereço,
 *    tipo de conector e potência (kW)
 *
 * Responsável: Miguel + Lorenzo
 */

$postos = [
    [
        'id' => 1,
        'nome' => 'Posto Jisa (BR)',              
        'cidade' => 'Pinheiros',           
        'endereco' => 'Av. Setembrino Pelissari, 40 - Bairro Pinheirinho, Pinheiros - ES, 29980-000, Brazil',          // ex: "Av. Américo Buaiz, 200"
        'tipo_conector' => 'CCS2', 
        'potencia_kw' => 60,  
    ],
    [
        'id' => 2,
        'nome' => 'Sau2 | BR-101',
        'cidade' => 'São Mateus',
        'endereco' => 'Sau2 - BR-101 - Conceição da Barra, ES, 29960-000',
        'tipo_conector' => 'Type 2',
        'potencia_kw' => 7,
    ],
    [
        'id' => 3,
        'nome' => 'Ponto De Apoio Rodonaldo',
        'cidade' => 'São Mateus',
        'endereco' => 'Ponto De Apoio Rodonaldo - BR-101, 57 - São Mateus, ES, Brasil',
        'tipo_conector' => 'Type 2',
        'potencia_kw' => 7,
    ],
    [
        'id' => 4,
        'nome' => 'EDP - São Mateus',
        'cidade' => 'São Mateus',
        'endereco' => 'R. Manoel Andrade, 14 - Centro, São Mateus - ES, 29936-714, Brazil',
        'tipo_conector' => 'Type 2',
        'potencia_kw' => 7,
    ],
    [
        'id' => 5,
        'nome' => 'Shopping Patiomix Linhares',
        'cidade' => 'Linhares',
        'endereco' => 'Shopping Patiomix Linhares - Linhares, ES, 29960-000',
        'tipo_conector' => 'Type 2',
        'potencia_kw' => 6,
    ],
    [
        'id' => 6,
        'nome' => '',
        'cidade' => '',
        'endereco' => '',
        'tipo_conector' => '',
        'potencia_kw' => 0,
    ],
    [
        'id' => 7,
        'nome' => '',
        'cidade' => '',
        'endereco' => '',
        'tipo_conector' => '',
        'potencia_kw' => 0,
    ],
    [
        'id' => 8,
        'nome' => '',
        'cidade' => '',
        'endereco' => '',
        'tipo_conector' => '',
        'potencia_kw' => 0,
    ],
    [
        'id' => 9,
        'nome' => '',
        'cidade' => '',
        'endereco' => '',
        'tipo_conector' => '',
        'potencia_kw' => 0,
    ],
    [
        'id' => 10,
        'nome' => '',
        'cidade' => '',
        'endereco' => '',
        'tipo_conector' => '',
        'potencia_kw' => 0,
    ]
   
];

/**
 * Busca todos os postos cadastrados numa cidade específica.
 * Usada quando a viagem não aguenta e é preciso sugerir onde recarregar.
 */
function buscarPostosPorCidade($cidade, $postos) {
    return array_values(array_filter($postos, fn($p) => $p['cidade'] === $cidade));
}

/**
 * Busca um posto específico pelo ID.
 */
function buscarPostoPorId($postoId, $postos) {
    foreach ($postos as $p) {
        if ($p['id'] == $postoId) {
            return $p;
        }
    }
    return null;
}