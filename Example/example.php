<?php

function includeIfExists($file) {
    if (file_exists($file)) {
        return include $file;
    }
}
if ((!$loader = includeIfExists(__DIR__."/../vendor/autoload.php")) && (!$loader = includeIfExists(__DIR__."/../../../autoload.php"))) {
    die("You must set up the project dependencies, run the following commands:".PHP_EOL.
        "curl -s http://getcomposer.org/installer | php".PHP_EOL.
        "php composer.phar install".PHP_EOL);
}

echo 'I use some SLEEP function to easier show how it works, please be patient and watch...'.PHP_EOL;

$allDataToProcess = 400000;

$eta = new Ankalagon\ETA\Eta($allDataToProcess);

$progress = 0;
while ($progress < $allDataToProcess) {
    sleep(5);
    $progress += rand(8000, 10000);
    $eta->setProcessedData($progress);
    echo sprintf('Progress: %s%%, ETA: %s', $eta->getProgress(), $eta->getEta()).PHP_EOL;
}