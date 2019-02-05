Service can count priogress and estimated time of arrival (ETA) of a process

Requirements
------------

* PHP7.1 and above

Installation
------------

Update your composer.json and run `composer update`

``` json
{
    "require": {
        "ankalagon/eta": "^1.0"
    }
}
```

or execute

``` bash
composer require ankalagon/eta
```

Usage
------------

``` php
    use Ankalagon\ETA\Eta;

    $eta = new Ankalagon\ETA\Eta($startTime, $allDataToProcess);
    
    //need to pass some time
    echo sprintf('Progress: %s%%, ETA: %s', $eta->getProgress(), $eta->getEta()).PHP_EOL;

```

Output produce by example script (in Example directory):

```angular2html
Progress: 0.04, ETA: 0h 08m 45s
Progress: 0.05, ETA: 0h 08m 45s
Progress: 0.05, ETA: 0h 08m 36s
Progress: 0.06, ETA: 0h 08m 28s
Progress: 0.07, ETA: 0h 08m 19s
Progress: 0.08, ETA: 0h 08m 12s
Progress: 0.09, ETA: 0h 08m 13s
Progress: 0.10, ETA: 0h 08m 10s
Progress: 0.11, ETA: 0h 08m 03s
Progress: 0.12, ETA: 0h 07m 59s
Progress: 0.13, ETA: 0h 07m 58s
Progress: 0.14, ETA: 0h 07m 56s
Progress: 0.15, ETA: 0h 07m 49s
Progress: 0.16, ETA: 0h 07m 43s
Progress: 0.16, ETA: 0h 07m 40s
Progress: 0.17, ETA: 0h 07m 38s
Progress: 0.18, ETA: 0h 07m 35s
Progress: 0.19, ETA: 0h 07m 31s
Progress: 0.20, ETA: 0h 07m 24s
Progress: 0.21, ETA: 0h 07m 20s
```
