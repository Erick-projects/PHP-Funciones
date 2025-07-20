<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios de Lógica con PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 30px; }
        input[type="text"], input[type="number"] { padding: 5px; width: 300px; }
        button { padding: 8px 15px; }
        .resultado { margin-top: 10px; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Ejercicios de Lógica con PHP</h1>

    <form method="post">
        <h3>1. Generar Serie Fibonacci</h3>
        <input type="number" name="fibonacci" placeholder="Ingresa un número">
        <button type="submit">Generar</button>
    </form>

    <form method="post">
        <h3>2. Verificar si es Primo</h3>
        <input type="number" name="primo" placeholder="Ingresa un número">
        <button type="submit">Verificar</button>
    </form>

    <form method="post">
        <h3>3. Verificar Palíndromo</h3>
        <input type="text" name="palindromo" placeholder="Ingresa una palabra o frase">
        <button type="submit">Verificar</button>
    </form>

    <div class="resultado">
    <?php
    function generarFibonacci($n) {
        $serie = [];
        if ($n >= 1) $serie[] = 0;
        if ($n >= 2) $serie[] = 1;
        for ($i = 2; $i < $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        return $serie;
    }

    function esPrimo($numero) {
        if ($numero <= 1) return false;
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) return false;
        }
        return true;
    }

    function esPalindromo($texto) {
        $texto = strtolower(preg_replace('/[^a-z0-9]/i', '', $texto));
        return $texto === strrev($texto);
    }

    if (isset($_POST['fibonacci'])) {
        $n = (int)$_POST['fibonacci'];
        $resultado = generarFibonacci($n);
        echo "Fibonacci ($n): " . implode(", ", $resultado);
    }

    if (isset($_POST['primo'])) {
        $n = (int)$_POST['primo'];
        echo "$n " . (esPrimo($n) ? "es un número primo." : "no es un número primo.");
    }

    if (isset($_POST['palindromo'])) {
        $texto = $_POST['palindromo'];
        echo "\"$texto\" " . (esPalindromo($texto) ? "es un palíndromo." : "no es un palíndromo.");
    }
    ?>
    </div>

</body>
</html>
