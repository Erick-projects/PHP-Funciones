<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios de Lógica en PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 20px; }
        input, select { padding: 6px; margin: 5px 0; width: 300px; }
        button { padding: 6px 15px; }
        .resultado { font-weight: bold; margin-top: 10px; color: #2c3e50; }
    </style>
</head>
<body>

    <h1>Ejercicios de Lógica con PHP</h1>

    <form method="post">
        <h3>1. Sumar Números Pares en un Array</h3>
        <label>Ingresa números separados por comas (ej: 1,2,3,4,5):</label><br>
        <input type="text" name="numeros_pares">
        <br><button type="submit">Sumar Pares</button>
    </form>

    <form method="post">
        <h3>2. Costo de Llamada Internacional</h3>
        <label>Clave de Zona:</label><br>
        <select name="clave">
            <option value="12">12 - América del Norte</option>
            <option value="15">15 - América Central</option>
            <option value="18">18 - América del Sur</option>
            <option value="19">19 - Europa</option>
            <option value="23">23 - Asia</option>
            <option value="25">25 - África</option>
            <option value="29">29 - Oceanía</option>
        </select><br>
        <label>Minutos hablados:</label><br>
        <input type="number" name="minutos" min="1">
        <br><button type="submit">Calcular Costo</button>
    </form>

    <form method="post">
        <h3>3. FizzBuzz</h3>
        <label>Ingresa un número:</label><br>
        <input type="number" name="fizzbuzz" min="1" max="10000">
        <br><button type="submit">Generar FizzBuzz</button>
    </form>

    <div class="resultado">
    <?php
    function sumarPares($array) {
        $suma = 0;
        foreach ($array as $numero) {
            if ($numero % 2 == 0) {
                $suma += $numero;
            }
        }
        return $suma;
    }

    function calcularCostoLlamada($clave, $minutos) {
        $zonas = [
            12 => 2.00,
            15 => 2.20,
            18 => 4.50,
            19 => 3.50,
            23 => 6.00,
            25 => 6.00,
            29 => 5.00
        ];

        if (!isset($zonas[$clave])) {
            return "Clave no válida.";
        }

        $precioMinuto = $zonas[$clave];
        $total = $minutos * $precioMinuto;

        if ($minutos < 30) {
            $total *= 0.90;
        }

        return "Costo total: $" . number_format($total, 2);
    }

    function fizzBuzz($n) {
        $resultado = [];
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $resultado[] = "FizzBuzz";
            } elseif ($i % 3 == 0) {
                $resultado[] = "Fizz";
            } elseif ($i % 5 == 0) {
                $resultado[] = "Buzz";
            } else {
                $resultado[] = (string)$i;
            }
        }
        return $resultado;
    }

    if (isset($_POST['numeros_pares'])) {
        $entrada = $_POST['numeros_pares'];
        $array = array_map('intval', explode(',', $entrada));
        echo "Suma de números pares: " . sumarPares($array);
    }

    if (isset($_POST['clave']) && isset($_POST['minutos'])) {
        $clave = intval($_POST['clave']);
        $minutos = intval($_POST['minutos']);
        echo calcularCostoLlamada($clave, $minutos);
    }

    if (isset($_POST['fizzbuzz'])) {
        $n = intval($_POST['fizzbuzz']);
        $resultado = fizzBuzz($n);
        echo "FizzBuzz hasta $n:<br>" . implode(", ", $resultado);
    }
    ?>
    </div>

</body>
</html>
