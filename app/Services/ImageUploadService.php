<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    /**
     * This will upload images and will save them to the path.
     *
     * @param UploadedFile $image
     * @param string $destinationPath
     * @param string $fileName
     * @return string
     */
    public function uploadImage(UploadedFile $image, $destinationPath, $fileName = null): string
    {
        $fileName = $fileName ?: time() . '_' . $image->getClientOriginalName();
        $image->move(public_path($destinationPath), $fileName);
        return $fileName;
    }
}
