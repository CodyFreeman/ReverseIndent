#!/usr/bin/env php
<?php
declare(strict_types = 1);
require __DIR__ . '/../src/ReverseIndent.php';

const EXAMPLE_USE = 'Usage example: php <your path>/bin/reverseIndent.php inputFile outputFile';

if(!isset($argv[2])){
    echo 'Did not detect 2 arguments. ' . EXAMPLE_USE . PHP_EOL;
    die;
}

if (!file_exists($argv[1])){
    echo 'Input file does not exist. ' . EXAMPLE_USE . PHP_EOL;
    die;
}
if (file_exists($argv[2])){
    echo 'Your output file already exists. ' . EXAMPLE_USE . PHP_EOL;
    die;
}

$revIn = new \Freeman\ReverseIndent\ReverseIndent\ReverseIndent();

if(file_put_contents($argv[2], $revIn->run(file_get_contents($argv[1])))){
    echo 'Wrote to file: ' . $argv[2] . PHP_EOL;
}else{
    echo 'Operation failed' . PHP_EOL;
    die;
}
