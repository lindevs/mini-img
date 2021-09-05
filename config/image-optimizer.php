<?php

declare(strict_types=1);

use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\ImageOptimizer\Optimizers\Gifsicle;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Optipng;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Svgo;

return [
    'optimizers' => [

        Jpegoptim::class => [
            '-m85',              // Set maximum image quality factor. Valid quality values: 0 - 100.
            '--strip-all',       // Strip all markers (comments, EXIF data, etc.) from output file.
            '--all-progressive', // Force output file to be progressive.
        ],

        Pngquant::class => [
            '--force', // Overwrite existing output files (required by image-optimizer package).
        ],

        Optipng::class => [
            '-i0',    // This will result in a non-interlaced, progressive scanned image.
            '-o2',    // Optimization level (multiple IDAT compression trials).
            '-quiet', // Run in quiet mode (required by image-optimizer package).
        ],

        Svgo::class => [],

        Gifsicle::class => [
            '-b',         // Batch mode: modify inputs, write back to same filenames (required by image-optimizer package).
            '-O3',        // Optimize output file. This produces the slowest but best results.
            '--lossy=80', // Alter image colors to shrink output file size.
        ],

        Cwebp::class => [
            '-m 6',     // Slowest compression method in order to get the best compression.
            '-pass 10', // For maximizing the amount of analysis pass.
            '-mt',      // Use multi-threading if available to improve speed.
            '-q 90',    // Quality factor (0 - 100).
        ],
    ],

    /*
    * The directory where your binaries are stored.
    * Only use this when your binaries are not accessible in the global environment.
    */
    'binary_path' => '',

    /*
     * The maximum time in seconds each optimizer is allowed to run separately.
     */
    'timeout' => 60,

    /*
     * If set to `true` all output of the optimizer binaries will be appended to the default log.
     * You can also set this to a class that implements `Psr\Log\LoggerInterface`.
     */
    'log_optimizer_activity' => false,
];
