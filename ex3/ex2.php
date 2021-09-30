<?php

$numbers = [1, 2, '3', 6, 2, 3, 2, 3];

print var_dump(isInList($numbers, 6));

function isInList($list, $elementToBeFound) {

    foreach ($list as $each) {
        if ($each === $elementToBeFound) {
            return true;
        }
    }
    return false;
}