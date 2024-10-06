<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\MyLib\PhotoGpsLib;
use Illuminate\Http\Request;

class PhotoGpsController extends BaseController
{
    /**
     * returns gps data from urls
     */
    public function files(Request $request)
    {
        $files = PhotoGpsLib::getFileUrls($request);
        $gps = PhotoGpsLib::getGpsData($files);
        PhotoGpsLib::logAccess(
            request: $request,
            data: [
                'files' => $files,
                'is_error' => false,
                'gps' => $gps,
            ],
        );

        return $gps;
    }

    /**
     * returns gps data from uploaded files
     */
    public function upload(Request $request)
    {
        $files = PhotoGpsLib::getUploadedFiles($request);
        $gps = PhotoGpsLib::getGpsData($files);
        $originalNames = PhotoGpsLib::getOriginalNames($request);

        foreach ($gps as $i => $data) {
            $path = $data['file'];
            $gps[$i]['file'] = $originalNames[$path];
        }

        PhotoGpsLib::logAccess(
            request: $request,
            data: [
                'files' => $files,
                'is_error' => false,
                'gps' => $gps,
            ],
        );

        return $gps;
    }
}
