<?php

declare(strict_types=1);

namespace App\Factories;

use App\Exceptions\InvalidConfiguration;
use Spatie\ImageOptimizer\DummyLogger;
use Spatie\ImageOptimizer\Optimizer;
use Spatie\ImageOptimizer\OptimizerChain;

class ImageOptimizerChainFactory
{
    public static function create(array $config): OptimizerChain
    {
        return (new OptimizerChain())
            ->useLogger($config['log_optimizer_activity'] ? app('log') : new DummyLogger())
            ->setTimeout($config['timeout'])
            ->setOptimizers(self::getOptimizers($config));
    }

    private static function getOptimizers(array $config): array
    {
        $optimizers = [];

        foreach ($config['optimizers'] as $optimizerClass => $options) {
            $optimizer = new $optimizerClass();
            if (!($optimizer instanceof Optimizer)) {
                throw new InvalidConfiguration(sprintf('%s does not implement Optimizer interface', $optimizerClass));
            }

            $optimizer->setOptions($options);

            $binaryPath = $config['binary_path'] ?? '';
            if (!empty($binaryPath)) {
                $optimizer->setBinaryPath($binaryPath);
            }

            $optimizers[] = $optimizer;
        }

        return $optimizers;
    }
}