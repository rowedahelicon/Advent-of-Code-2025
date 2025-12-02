<?php

$input = explode("\n", trim(file_get_contents('input.txt')));

$dial = 50;
$pwd_1 = 0;
$pwd_2 = 0;

foreach ($input as $k => $v)
{
    $d = substr($v, 1) * ($v[0] == "L" ? -1 : 1);
    $mod = ($dial + $d) % 100;

    $pwd_1 += ($mod == 0);
    $pwd_2 += $d > 0 ? floor(($dial + $d) / 100) - floor($dial / 100) : floor(($dial - 1) / 100) - floor(($dial - 1 + $d) / 100);
    $dial = $mod;
}

echo $pwd_1.PHP_EOL;
echo $pwd_2.PHP_EOL;