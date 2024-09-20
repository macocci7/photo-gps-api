<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\MyLib\PhotoGpsLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhotoGpsController extends BaseController
{
    public function files(Request $request)
    {
        $files = PhotoGpsLib::getFileUrls($request);
        $validator = Validator::make(
            data: [$files],
            rules: [
                'file*' => 'nullable|string|url:http,https',
            ],
        );
        if ($validator->fails()) {
            return $this->sendError(
                message: 'Invalid files specified.',
                data: [
                    'files' => $files,
                    'messages' => $validator->messages(),
                ],
                code: 403,
            );
        }
        return PhotoGpsLib::getGpsData($files);
    }

    public function upload(Request $request)
    {
        $files = PhotoGpsLib::getUploadedFiles($request);
        $gps = PhotoGpsLib::getGpsData($files);
        $originalNames = PhotoGpsLib::getOriginalNames($request);
        foreach ($gps as $i => $data) {
            $path = $data['file'];
            $gps[$i]['file'] = $originalNames[$path];
        }
        return $gps;
    }
}
