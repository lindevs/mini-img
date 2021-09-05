<?php

declare(strict_types=1);

namespace App\Services;

use App\Constant\DirectoryConst;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileUploadService
{
    public static function storeImage(UploadedFile $file): string
    {
        return sprintf(
            '%s%s%s',
            DirectoryConst::UPLOADS_BASE_PATH,
            DIRECTORY_SEPARATOR,
            $file->storeAs(Str::random(32), $file->getClientOriginalName(), DirectoryConst::UPLOADS_DISK)
        );
    }
}
