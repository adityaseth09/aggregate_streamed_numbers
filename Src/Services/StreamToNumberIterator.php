<?php

namespace ResearchGate\Src\Services;

use Generator;

class StreamToNumberIterator
{
    /**
     * @param $line
     * @return mixed
     */
    private function sanitize($line)
    {
        $line = str_replace(',', '', $line);
        $line = preg_replace('/\s+/', ',', $line);
        return $line;
    }

    /**
     * @param $streamResource
     * @return Generator
     */
    public function iterate($streamResource)
    {
        while ($line = trim(fgets($streamResource))) {
            $line = $this->sanitize($line);

            $values = explode(',', $line);

            foreach ($values as $value) {
                yield $value;
            }
        }
    }
}
