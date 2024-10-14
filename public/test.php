<?php
$rep = [
    [
        'name' => 'John',
        'age' => 25,
        'price' => 5
    ],
    [
        'name' => 'Jane',
        'age' => 30,
        'price' => 8
    ],
    [
        'name' => 'Doe',
        'age' => 35,
        'price' => 3
    ],
    [
        'name' => 'Smith',
        'age' => 40,
        'price' => 20
    ],
    [
        'name' => 'Doe',
        'age' => 45,
        'price' => 100
    ],
    [
        'name' => 'Smith',
        'age' => 50,
        'price' => 6
    ]
];

function price(array $data)
{
    $arr = [];
    foreach ($data as $value) {
        if ($value['price'] != 0){
            $arr[] = $value['price'];
        }
    }
    return $arr;
}


function median(array $i)
{
    sort($i);
    $count = count($i);
    if ($count % 2 == 0){
        return ($i[($count/2)-1] + $i[($count/2)])/2;
    }
    return $i[floor(($count-1)/2)];
}

function intTo($min,$max,$n)
{
    $ag = $max-$min;
    $ag = $ag/$n;

    $arr = [];

    for ($i = 0; $i < $n; $i++) {
        $num = $min + ($ag*($i+1));
        $arr[] = $num;
    }
    return $arr;
}

$l = intTo(143,177,40);

echo median($l);