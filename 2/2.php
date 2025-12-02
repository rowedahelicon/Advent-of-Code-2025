<?php

$input = explode(",", trim(file_get_contents('input.txt')));

$part_1 = 0;
$part_2 = 0;

foreach ($input as $k => $v)
{
    $range = explode("-", $v);

    $range = range($range[0], $range[1]);

    foreach ($range as $rk => $rv)
    {
        if (strlen($rv) % 2 == 0)
        {
            $split = str_split($rv, strlen($rv) / 2);

            if ($split[0] == $split[1]) 
            {
                $part_1 += $rv;
            }
        }

        preg_match_all('/\b(\d+)\1+\b/m', $rv, $matches, PREG_SET_ORDER, 0);
        if (isset($matches[0][0])) $part_2 += $matches[0][0];
    }
}

echo $part_1.PHP_EOL;
echo $part_2.PHP_EOL;