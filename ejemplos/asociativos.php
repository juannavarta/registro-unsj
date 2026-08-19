<?php

// ejemplo de arreglo asociativo
$persona = [
    "nombre" => "Juan",
    "edad" => 24,
    "altura" => 1.76
];

// Lo mismo en JSON sería:
/*
{
    "nombre": "Juan",
    "edad": 24,
    "altura": 1.76
}
*/
echo $persona["nombre"] . "\n"; // Juan
echo $persona["edad"] . "\n"; // 24
echo $persona["altura"] . "\n"; // 1.76

$personas = [
    [
        "nombre" => "Juan",
        "edad" => 24,
        "altura" => 1.76
    ],
    [
        "nombre" => "María",
        "edad" => 30,
        "altura" => 1.65
    ],
    [
        "nombre" => "Pedro",
        "edad" => 28,
        "altura" => 1.80
    ]
];

foreach ($personas as $persona) {
    echo "Nombre: " . $persona["nombre"] . "\n";
    echo "Edad: " . $persona["edad"] . "\n";
    echo "Altura: " . $persona["altura"] . "\n";
    echo "\n";
}

// Lo mismo en JSON sería:
/*
[
    {
        "nombre": "Juan",
        "edad": 24,
        "altura": 1.76
    },
    {
        "nombre": "María",
        "edad": 30,
        "altura": 1.65
    },
    {
        "nombre": "Pedro",
        "edad": 28,
        "altura": 1.80
    }
]
*/

// Agregar una nueva persona al arreglo
$nuevaPersona = [
    "nombre" => "Ana",
    "edad" => 22,
    "altura" => 1.70
];

$personas[] = $nuevaPersona;

foreach ($personas as $persona) {
    echo "Nombre: " . $persona["nombre"] . "\n";
    echo "Edad: " . $persona["edad"] . "\n";
    echo "Altura: " . $persona["altura"] . "\n";
    echo "\n";
}