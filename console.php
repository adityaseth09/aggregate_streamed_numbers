#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;

require(__DIR__ . '/vendor/autoload.php');

$application = new Application();
$application->addCommands([
    new \ResearchGate\Src\Commands\AggregateCommand()
]);

exit($application->run());
