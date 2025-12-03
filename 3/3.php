<?php

function bsearch (string $line, int $length = 2) : int
{
    $full = $largest = substr($line, 0, $length);
    $split = str_split(substr($line, $length));
    
    foreach ($split as $k => $v)
    {
        for ($x = 0; $x < $length; $x++)
        {
            if (($cur_full = substr($full, 0, $x).substr($full, $x + 1).$v) > $largest) $largest = $cur_full;
        }

        $full = $largest;
    }
    return $full;
}

$part_1 = 0;
$part_2 = 0;


$input = explode("\n", trim(file_get_contents('input.txt')));

foreach ($input as $k => $v)
{
    $part_1 += bsearch($v, 2);
    $part_2 += bsearch($v, 12);
}   

echo $part_1.PHP_EOL;
echo $part_2.PHP_EOL;