<?php

$personas = [
    [
        "nombre" => "Juan",
        "edad" => 24,
        "dni" => "12345678"
    ],
    [
        "nombre" => "María",
        "edad" => 30,
        "dni" => "87654321"
    ],
    [
        "nombre" => "Pedro",
        "edad" => 28,
        "dni" => "11223344"
    ]
];



function buscarPersonaDNI(array $personas, string $dniABuscar) {
    foreach ($personas as $persona) {
        if ($persona["dni"] === $dniABuscar) {
            return $persona;
        }
    }
    return null;
}

$dniABuscar = "87654321";
$resultado = buscarPersonaDNI($personas, $dniABuscar);

if ($resultado !== null) {
    echo "Persona encontrada (DNI): " . $resultado["nombre"] . ", Edad: " . $resultado["edad"] . ", DNI: " . $resultado["dni"] . "\n";
} else {
    echo "Persona no encontrada.\n";
}

function buscarPersonaNombre(array $personas, string $nombreABuscar) {
    foreach ($personas as $persona) {
        if (strcasecmp($persona["nombre"], $nombreABuscar) === 0) {
            return $persona;
        }
    }
    return null;
}

$nombreABuscar = "Pedro";
$resultadoNombre = buscarPersonaNombre($personas, $nombreABuscar);

if ($resultadoNombre !== null) {
    echo "Persona encontrada (Nombre): " . $resultadoNombre["nombre"] . ", Edad: " . $resultadoNombre["edad"] . ", DNI: " . $resultadoNombre["dni"] . "\n";
} else {
    echo "Persona no encontrada.\n";
}

function busquedaBinariaDNI (array $personas, string $dniABuscar) {
    usort($personas, function($a, $b) {
        return strcmp($a["dni"], $b["dni"]);
    });

    $inferior = 0;
    $superior = count($personas) - 1;

    while ($inferior <= $superior) {
        $medio = floor(($inferior + $superior) / 2);
        if ($personas[$medio]["dni"] === $dniABuscar) {
            return $personas[$medio];
        } elseif ($personas[$medio]["dni"] < $dniABuscar) {
            $inferior = $medio + 1;
        } else {
            $superior = $medio - 1;
        }
    }

    return null;
}

$dniABuscar = "12345678";
$resultadoBinaria = busquedaBinariaDNI($personas, $dniABuscar);

if ($resultadoBinaria !== null) {
    echo "Persona encontrada (Búsqueda Binaria): " . $resultadoBinaria["nombre"] . ", Edad: " . $resultadoBinaria["edad"] . ", DNI: " . $resultadoBinaria["dni"] . "\n";
} else {
    echo "Persona no encontrada (Búsqueda Binaria).\n";
}