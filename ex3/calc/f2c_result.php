<?php

$temp = $_POST["temperature"] ?? "";

if (empty($temp)) {
    $message = "Insert temperature";
} else if (!is_numeric($temp)){
    $message = "Temperature must be an integer";
} else {
    $message = sprintf("%s decrees in Fahrenheit is %s decrees in Celsius",
        $temp, f2c($temp));
}

function f2c($temp) {
    return (intval($temp) - 32) / (9/5);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fahrenheit to Celsius</title>
</head>
<body>

    <nav>
        <a id="c2f" href="c2f.html">Celsius to Fahrenheit</a> |
        <a id="c2f" href="f2c.html">Fahrenheit to Celsius</a>
    </nav>

    <main>

        <h3>Fahrenheit to Celsius</h3>

        <em><?= $message ?></em>

    </main>

</body>
</html>
