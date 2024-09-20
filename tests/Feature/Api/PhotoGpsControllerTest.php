<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PhotoGpsControllerTest extends TestCase
{
    public function test_files_can_work_correctly(): void
    {
        $files = [
            'file1' => 'http://macocci7.net/photo/gps/remote_fake_gps_001.jpg',
            'file2' => 'https://macocci7.net/photo/gps/remote_fake_gps_002.jpg',
            'file3' => 'https://raw.githubusercontent.com/macocci7/PHP-PhotoGps/main/example/img/without_gps.jpg',
            'file4' => 'ftp://macocci7.net/photo/gps/remote_fake_gps_003.jpg',
        ];
        $this->post(route('api.files'), $files)
            ->assertJson(
                fn (AssertableJson $json) =>
                    $json
                        ->where('0.file', $files['file1'])
                        ->where('0.exif_version', '0300')
                        ->where('0.gps_data.GPSLatitudeRef', 'N')
                        ->where('0.gps_data.GPSLongitudeRef', 'E')
                        ->where('0.gps_data.GPSAltitudeRef', '3')
                        ->where('1.file', $files['file2'])
                        ->where('1.exif_version', '0300')
                        ->where('1.gps_data.GPSLatitudeRef', 'S')
                        ->where('1.gps_data.GPSLongitudeRef', 'W')
                        ->where('1.gps_data.GPSAltitudeRef', '0')
                        ->where('2.file', $files['file3'])
                        ->where('2.exif_version', '0220')
                        ->where('2.gps_data', [])
                        ->missing('3')
                        ->etc()
            );
    }

    public function test_upload_can_work_correctly(): void
    {
        $files = [
            'file1' => 'remote_fake_gps_001.jpg',
            'file2' => 'remote_fake_gps_002.jpg',
            'file3' => 'without_gps.jpg',
        ];
        $prefix = './tests/Feature/Api/files/';
        $uploadedFiles = [];
        foreach ($files as $key => $file) {
            $uploadedFiles[$key] = new UploadedFile(
                path: $prefix . $file,
                originalName: $file,
                mimeType: 'image/jpeg',
                error: null,
                test: true,
            );
        }
        $this->post(route('api.upload'), $uploadedFiles)
            ->assertJson(
                fn (AssertableJson $json) =>
                    $json
                        ->where('0.file', $files['file1'])
                        ->where('0.exif_version', '0300')
                        ->where('0.gps_data.GPSLatitudeRef', 'N')
                        ->where('0.gps_data.GPSLongitudeRef', 'E')
                        ->where('0.gps_data.GPSAltitudeRef', '3')
                        ->where('1.file', $files['file2'])
                        ->where('1.exif_version', '0300')
                        ->where('1.gps_data.GPSLatitudeRef', 'S')
                        ->where('1.gps_data.GPSLongitudeRef', 'W')
                        ->where('1.gps_data.GPSAltitudeRef', '0')
                        ->where('2.file', $files['file3'])
                        ->where('2.exif_version', '0220')
                        ->where('2.gps_data', [])
                        ->etc()
            );
    }
}
