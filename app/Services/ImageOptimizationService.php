<?php

declare(strict_types=1);

namespace App\Services;

use App\Factories\ImageOptimizerChainFactory;

class ImageOptimizationService
{
    public static function compress(string $imagePath): void
    {
        $optimizerChain = ImageOptimizerChainFactory::create(config('image-optimizer'));

        $outputImagePath = dirname($imagePath).DIRECTORY_SEPARATOR.'temp-'.basename($imagePath);
        $optimizerChain->optimize($imagePath, $outputImagePath);

        if (filesize($outputImagePath) < filesize($imagePath)) {
            rename($outputImagePath, $imagePath);
        } else {
            unlink($outputImagePath);
        }
    }
}
