<?php

set_time_limit(600);

use Tree\Models\BinaryTree;
use Tree\Helpers\PathSearch;

$loader = require( __DIR__ . '/vendor/autoload.php' );



$min = 1;
$max = 10000000;
$middle = round((($max + $min) / 2), 0);

$iterations = [
    1000,
    5000,
    10000,
    25000,
];


/*
 * Вставка данных
 */

echo PHP_EOL;
echo 'Вставка данных (сек.):' . PHP_EOL;

echo '---------------------------------------------------------------------------' . PHP_EOL;
echo 'Количество итераций' . "\t\t\t";
foreach ($iterations as $iteration) {
    echo $iteration . "\t";
}
echo PHP_EOL . '---------------------------------------------------------------------------' . PHP_EOL;

echo ' - бинарное дерево ' . "\t\t\t";
foreach ($iterations as $iteration) {
    $start = microtime(true);
    $tree = new BinaryTree($middle);
    for ($i = 0; $i <= $iteration; $i++) {
        $tree->insert(new BinaryTree(rand($min, $max)));
    }
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}

echo PHP_EOL . ' - массив с сортировкой при добавлении  ';
$data_sort = [];
foreach ($iterations as $iteration) {
    $start = microtime(true);
    for ($i = 0; $i <= $iteration; $i++) {
        $value = rand($min, $max);
        $data_sort[$value] = $value;
        ksort($data_sort);
    }
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}

echo PHP_EOL . ' - массив с постсортировкой ' . "\t\t";
$data_sort = [];
foreach ($iterations as $iteration) {
    $start = microtime(true);
    for ($i = 0; $i <= $iteration; $i++) {
        $value = rand($min, $max);
        $data_sort[$value] = $value;
    }
    ksort($data_sort);
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}


/*
 * Поиск данных
 */
echo PHP_EOL . PHP_EOL . PHP_EOL;
echo 'Поиск данных (сек.): ' . PHP_EOL;

echo '---------------------------------------------------------------------------' . PHP_EOL;
echo 'Количество итераций' . "\t\t\t";
foreach ($iterations as $iteration) {
    echo $iteration . "\t";
}
echo PHP_EOL . '---------------------------------------------------------------------------' . PHP_EOL;

echo ' - бинарное дерево ' . "\t\t\t";
$node_from = $middle;
$PathSearch = new PathSearch();
foreach ($iterations as $iteration) {
    $start = microtime(true);
    for ($i = 0; $i <= $iteration; $i++) {
        $node_to = rand($min, $max);
        $PathSearch->start();
        $PathSearch->setPath($node_from, $node_to);
        $tree->find($node_to, $PathSearch);
    }
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}

echo PHP_EOL . ' - прямой перебор массива ' . "\t\t";
foreach ($iterations as $iteration) {
    $start = microtime(true);
    for ($i = 0; $i <= $iteration; $i++) {
        $value = rand($min, $max);
        reset($data_sort);
        foreach ($data_sort as $value) {
            if (isset($data_sort[$value])) {
                $result = $data_sort[$value];
                continue(1);
            }
        }
    }
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}

echo PHP_EOL . ' - сортированный по ключу массив ' . "\t"; 
foreach ($iterations as $iteration) {
    $start = microtime(true);
    for ($i = 0; $i <= $iteration; $i++) {
        $value = rand($min, $max);
        if (isset($data_sort[$value])) {
            $result = $data_sort[$value];
        }
    }
    echo substr((microtime(true) - $start), 0, 6) . "\t";
}

echo PHP_EOL . PHP_EOL;

