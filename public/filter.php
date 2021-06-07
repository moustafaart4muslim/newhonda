<?php

$data = [
        [
        'name' => 'Necklace',
        'created_at' => '2019-03-01'
        ],
        [
        'name' => 'Bracelet',
        'created_at' => '2019-03-05'
        ],
        [
        'name' => 'Dog Chain',
        'created_at' => '2020-05-27'
        ]
    ];
    


function filterMarch($item)
{
    $pattern = "/-03-/i";
    return preg_match($pattern, $item['created_at']);
}

$filteredArray = array_filter($data, "filterMarch");

?>