<?php
namespace App\Helpers;

use Illuminate\Http\Request;

class FileHelper
{
    public static function handleSingleFileUpload(Request $request, $attributeName = null): Request
    {
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images', $fileName);
            $newRequestArray = $request->except(['file']);
            $newRequestArray[$attributeName] = $fileName;
            return new Request($newRequestArray);
        }
        return $request;
    }
}
