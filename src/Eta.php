<?php declare(strict_types=1);

namespace Ankalagon\ETA;

use \Datetime;

class Eta
{

    private $startTime;
    /**
     * @var int
     */
    private $allData = 0;

    /**
     * @var int
     */
    private $processedData = 0;

    /**
     * Eta constructor.
     * @param int $allData
     * @param Datetime|null $startTime
     */
    public function __construct(int $allData, Datetime $startTime = null)
    {
        $this->allData = $allData;
        if ($startTime === null) {
            $startTime = new DateTime();
        }

        $this->startTime = $startTime;
    }

    /**
     * @param mixed $processedData
     */
    public function setProcessedData(int $processedData): void
    {
        $this->processedData = $processedData;
    }

    /**
     * @return int
     */
    public function getAllData(): int
    {
        return $this->allData;
    }

    /**
     * @return mixed
     */
    public function getProcessedData()
    {
        return $this->processedData;
    }

    /**
     * @return string
     */
    public function getProgress(): float
    {
        if (!$this->allData) {
            return (float) 0;
        }

        return (float) number_format($this->processedData / $this->allData * 100, 2);
    }

    /**
     * @return string
     */
    public function getEta(): string
    {
        if (!$this->allData) {
            $eta = 0;
        } else {
            $elapsedTimeInSeconds = (new DateTime())->getTimestamp() - $this->startTime->getTimestamp();
            $estimatedProgress = $this->processedData / $this->allData;
            $etaInSeconds = ($estimatedProgress == 0) ? 0 : round($elapsedTimeInSeconds / $estimatedProgress);
            $eta = $etaInSeconds - $elapsedTimeInSeconds;
        }

        return (new DateTime('@'.$eta))->format('G\h i\m s\s');
    }
}