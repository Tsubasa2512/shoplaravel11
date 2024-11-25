<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    public static function upload($file, $folder, $suffix = null)
    {
        if ($file && $file->isValid()) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $suffix
            ?  time() . '-' . $suffix . '.' . $fileExtension
            : time() . '.' . $fileExtension;
            $filePath = $folder . '/' . $fileName;
            $file->storeAs($folder, $fileName, 'public'); // lưu trữ vào disk public // cấu hình trong config/filesystems.php
            // return asset('storage/' . $filePath); // link fulll
            return $filePath; //link thư mục lưu trữ
        }

        return null;
    }
}
