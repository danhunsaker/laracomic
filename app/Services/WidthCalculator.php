<?php

namespace App\Services;

use Spatie\MediaLibrary\ResponsiveImages\WidthCalculator\FileSizeOptimizedWidthCalculator;

class WidthCalculator extends FileSizeOptimizedWidthCalculator
{
    protected function finishedCalculating(int $predictedFileSize, int $newWidth): bool
    {
        if ($newWidth < 20) {
            return true;
        }

        if ($predictedFileSize < (1024 * 1)) {
            return true;
        }

        return false;
    }
}
