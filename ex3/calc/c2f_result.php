<?php

$temp = $_POST["temperature"] ?? "";

if (empty($temp)) {
    $message = "Insert temperature";
} else if (!is_numeric($temp)){
    $message = "Temperature must be an integer";
} else {
    $message = sprintf("%s decrees in Celsius is %s decrees in Fahrenheit",
        $temp, c2f($temp));
}

function c2f($temp) {
    return intval($temp) * 9/5 + 32;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Celsius to Fahrenheit</title>
</head>
<body>

    <nav>
        <a id="c2f" href="c2f.html">Celsius to Fahrenheit</a> |
        <a id="f2c" href="f2c.html">Fahrenheit to Celsius</a>
    </nav>

    <main>

        <h3>Celsius to Fahrenheit</h3>
        <em><?= $message ?></em>

    </main>

</body>
</html>
