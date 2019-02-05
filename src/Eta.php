<?php declare(strict_types=1);

namespace Ankalagon\ETA;

use \Datetime;

class Eta
{

    private $startTime;
    private $allData;
    private $processedData;

    /**
     * Eta constructor.
     * @param $startTime
     * @param $allData
     */
    public function __construct(Datetime $startTime, int $allData)
    {
        $this->startTime = $startTime;
        $this->allData = $allData;
    }

    /**
     * @param mixed $processedData
     */
    public function setProcessedData(int $processedData): void
    {
        $this->processedData = $processedData;
    }

    /**
     * @return string
     */
    public function getProgress(): float
    {
        return (float) number_format($this->processedData / $this->allData * 100, 2);
    }

    /**
     * @return string
     */
    public function getEta(): string
    {
        $elapsedTimeInSeconds = (new DateTime())->getTimestamp() - $this->startTime->getTimestamp();
        $estimatedProgress = $this->processedData/$this->allData;
        $etaInSeconds = round($elapsedTimeInSeconds / $estimatedProgress);
        $eta = $etaInSeconds - $elapsedTimeInSeconds;

        return (new DateTime('@'.$eta))->format('G\h i\m s\s');
    }
}