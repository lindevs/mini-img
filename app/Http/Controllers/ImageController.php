<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CompressImageRequest;
use App\Services\FileUploadService;
use App\Services\ImageOptimizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ImageController
{
    public function index(): View
    {
        return view('image.index');
    }

    public function compress(CompressImageRequest $request): JsonResponse
    {
        $file = $request->file('file');
        $fileSize = $file->getSize();

        $imageRelativePath = FileUploadService::storeImage($file);
        $imagePath = public_path($imageRelativePath);
        ImageOptimizationService::compress($imagePath);

        $compressedFileSize = filesize($imagePath);
        $percentage = 100 - ($compressedFileSize / $fileSize * 100);

        return new JsonResponse(
            [
                'url' => url($imageRelativePath),
                'compressed_file_size' => filesize($imagePath),
                'percentage' => $percentage !== 0 ? sprintf('-%.2f', $percentage) : '0',
            ]
        );
    }
}
