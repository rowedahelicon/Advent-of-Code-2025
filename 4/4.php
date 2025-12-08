<?php

class day4
{
    public $grid = [];
    public $grid_clean = [];
    public $part_1 = 0;
    public $part_2 = 0;
    public $found = 0;

    function __construct()
    {
        $input = explode("\n", trim(file_get_contents('input.txt')));
        array_walk($input, function ($v, $k) { $this->grid[$k] = str_split($v, 1); });

        $this->grid_clean = $this->grid;
        array_walk($input, function ($v, $k) { array_walk($this->grid[$k], function ($lv, $lk) use ($k) {  if ($this->has_roll($k, $lk) && $this->count_nearby_rolls($k, $lk) < 4){ $this->grid_clean[$k][$lk] = 'X'; $this->part_1++; } });});

        while(true)
        {
            $this->found = 0;
            $this->grid = $this->grid_clean;
            
            array_walk($input, function ($v, $k) { array_walk($this->grid[$k], function ($lv, $lk) use ($k) {  if ($this->has_roll($k, $lk) && $this->count_nearby_rolls($k, $lk) < 4){ $this->grid_clean[$k][$lk] = 'X'; $this->found++; } });});

            $this->part_2 += $this->found;
            if ($this->found == 0) break;
        }

        echo $this->part_1.PHP_EOL;
        echo $this->part_2 + $this->part_1;
    }

    function has_roll($x, $y)
    {
        if (!isset($this->grid[$x][$y])) return false;
        if ($this->grid[$x][$y] == "@") return true;
        return false;
    }

    function count_nearby_rolls($x, $y)
    {
        $count = 0;

        if ($this->has_roll($x+1, $y)) $count++;
        if ($this->has_roll($x-1, $y)) $count++;
        if ($this->has_roll($x, $y+1)) $count++;
        if ($this->has_roll($x, $y-1)) $count++;
        if ($this->has_roll($x+1,$y+1)) $count++;
        if ($this->has_roll($x-1, $y-1)) $count++;
        if ($this->has_roll($x+1, $y-1)) $count++;
        if ($this->has_roll($x-1, $y+1)) $count++;

        return $count;
    }
}

$day4 = new day4();