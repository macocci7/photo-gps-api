<?php

namespace App\MyLib;

use Illuminate\Http\Request;
use Macocci7\PhpPhotoGps\Helpers\Exif;
use Macocci7\PhpPhotoGps\Helpers\Uri;
use Macocci7\PhpPhotoGps\PhotoGps;

class PhotoGpsLib
{
    public static function getFileUrls(Request $request)
    {
        $files = [];
        $count = config('photogps.limit.files.count');
        for ($i = 1; $i <= $count; $i++) {
            $file = $request->input('file' . $i);
            if (is_null($file)) {
                continue;
            }
            if (Uri::isAvailable($file)) {
                $files[] = $file;
            }
        }
        return $files;
    }

    /**
     * returns gps data
     *
     * @param   string[]    $files
     * @return  array<int, array<string, int|float|string>>
     */
    public static function getGpsData(array $files)
    {
        $pg = new PhotoGps();
        $gps = [];
        foreach ($files as $file) {
            if (is_null($file)) {
                continue;
            }
            $pg->load($file);
            $gps[] = [
                'file' => $file,
                'exif_version' => Exif::version(),
                'gps_data' => $pg->gps(),
            ];
        }
        return $gps;
    }

    /**
     * returns uploaded files
     *
     * @param   Request $request
     * @return  array<int, Illuminate\Http\UploadedFile>
     */
    public static function getUploadedFiles(Request $request)
    {
        $files = [];
        $count = config('photogps.limit.upload.count');
        for ($i = 1; $i <= $count; $i++) {
            $name = 'file' . $i;
            if ($request->hasFile($name)) {
                $files[] = $request->file($name)->getPathname();
            }
        }
        return $files;
    }

    /**
     * returns original names of uploaded files
     *
     * @param   Request $request
     * @return  string[]
     */
    public static function getOriginalNames(Request $request)
    {
        $names = [];
        $count = config('photogps.limit.upload.count');
        for ($i = 1; $i <= $count; $i++) {
            $name = 'file' . $i;
            if ($request->hasFile($name)) {
                $path = $request->file($name)->getPathname();
                $names[$path] = $request->file($name)->getClientOriginalName();
            }
        }
        return $names;
    }
}
