<?php

// Ejemplo de una función simple

function saludar($nombre) {
    return "Hola, " . $nombre . "!";
}

// Ejemplo de una función con parámetros opcionales
function calcularArea(float $base, ?float $altura = null) {
    if ($altura === null) {
        $altura = $base; // Si no se proporciona altura, se asume que es un cuadrado
    }
    return $base * $altura;
}

// Llamada a la función saludar
echo saludar("Juan") . "\n"; 

// Llamada a la función calcularArea con ambos parámetros
echo "Área: " . calcularArea(5, 10) . "\n"; 

// Llamada a la función calcularArea con base y altura por defecto
echo "Área con altura por defecto: " . calcularArea(5) . "\n"; 