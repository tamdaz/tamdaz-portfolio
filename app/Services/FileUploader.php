<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    public function __construct(
        protected Request $request
    ) {
    }

    public function upload(string $key, string $dir): void
    {
        /** @var UploadedFile $image */
        $image = $this->request->file($key)->store($dir, 'public');
    }

    public function update(int $id, string $key, string $dir): void
    {
        try {
            /**
             * @var \Illuminate\Http\UploadedFile $thumbnail
             */
            $thumbnail = $this->request->file('blog_thumb');
            $blog = Blog::find($id);

            if ($thumbnail !== null) {
                File::delete(substr($blog->blog_thumb, 1));
                $file_store = $thumbnail->store('thumbnail', 'public');

                $blog->update([
                    ...$this->request->all(),
                    'blog_thumb' => Storage::url('thumbnail/'.basename($file_store)),
                    'is_published' => $this->request->boolean('is_published'),
                ]);
            } else {
                $blog->update([
                    ...$this->request->all(),
                    'is_published' => $this->request->boolean('is_published'),
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
