<?php


foreach (range(1, 15) as $number) {
    if ($number % 3 === 0 && $number % 5 === 0) {
        print "FizzBuzz" . PHP_EOL;
    } else if ($number % 5 === 0) {
        print "Buzz" . PHP_EOL;
    } else if ($number % 3 === 0) {
        print "Fizz" . PHP_EOL;
    } else {
        print $number . PHP_EOL;
    }
}