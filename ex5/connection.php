<?php

const USERNAME = 'cer_lynl';
const PASSWORD = 'E939B3';

function getConnection() : PDO {
    $host = 'db.mkalmo.xyz';

    $address = sprintf('mysql:host=%s;port=3306;dbname=%s',
        $host, USERNAME);

    return new PDO($address, USERNAME, PASSWORD);
}
