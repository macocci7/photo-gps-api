# Photo GPS API

An simple API which returns GPS data of photos from their EXIF data.

## 1. Features

## 2. Contents

## 3. Requirements

## 4. Deployment

## 5. Usage

## 6. Limitations

- Rate Limit: 6 access per minute, per user (or IP).
- Size Limit: 10MB per file.
- File Type: JPEG only.
- Files Count: 5 files per access.
- Uploading Files: 5 files per upload.

## 7. Endpoints

|name|method|endpoint|params|description|
|:---|:---|:---|:---|:---|
|form|`GET`|`/form`|-|form page for posting data to the apis|
|upload|`POST`|`/api/upload`|`files[]`|uploading files api|
|files|`POST`|`/api/files`|`files[]`|files api|

## 8. LICENSE

**

Copyright 2024 macocci7
