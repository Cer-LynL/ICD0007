<?php

$numbers = [3, 2, 5, 6];

// [1, 2, 3] -> "1, 2, 3" -> [1,  2, 3]

$joined = join(", ", $numbers);

print $joined;

 print_r(explode(", ", $joined));