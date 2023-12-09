<?php

namespace App\Services;

use File;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FileUploader
{
    public function __construct(protected Request $request) {}

    public function upload(string $key, string $path, Closure $closure): ?Closure
    {
        $file = $this->request->file($key)->store($path, 'public');

        return $closure($file);
    }

    public function update(string $file, string $fileName, string $path, Closure $closure): ?Closure
    {
        /*** @var UploadedFile $file */
        $uploadedFile = $this->request->file($file);

        if ($uploadedFile !== null) {
            $this->delete($fileName);
            $file_store = $uploadedFile->store($path, 'public');

            return $closure(true, $file_store);
        } else {
            return $closure(false, null);
        }
    }

    public function delete(string $file): void
    {
        if (File::exists(substr($file, 1))) {
            File::delete(substr($file, 1));
        }
    }
}
