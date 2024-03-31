<?php
namespace App\Helpers;

use Illuminate\Http\Request;

class FileHelper
{
    public static function handleSingleFileUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images', $fileName);
            return $fileName;
        }
        return null;
    }
}
