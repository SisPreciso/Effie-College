<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ImageTrait
{
    /**
     * @param string $path
     * @param string $imageName
     * @return string
     */
    public function saveImage(string $path, string $imageName): string
    {
        $publicPath = 'public';
        $image = request()->file($imageName)->store("{$publicPath}/{$path}");

        return str_replace("{$publicPath}/", '', $image);
    }

    /**
     * @param string $path
     * @param string $imageName
     * @param Model $model
     * @return mixed|string
     */
    public function updateImage(string $path, string $imageName, Model $model)
    {
        return request()->hasFile($imageName) ? $this->saveImage($path, $imageName) : $model->image;
    }
}
