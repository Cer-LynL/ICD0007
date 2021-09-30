<?php

$numbers = [1, 2, 5, 6, 2, 11, 2, 7];

print_r(getOddNUmbers($numbers));

function getOddNUmbers($list) {

    $oddNumbers = [];

    foreach ($list as $each) {
        if ($each % 2 === 1) {
            $oddNumbers[] = $each;
        }
    }
    return $oddNumbers;
}
