<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use File;


class Upload extends Model
{
    use HasFactory;



    /**
     * Загрузка изображения без сжатий
     *
     * @param $image
     * @param $path
     *
     *
     */
    public static function uploadImage($image, $path)
    {
        $path_file = public_path('files/' . '' . $path);
        self::checkDir('files/' . '' . $path);
        $imageName = Str::random(23) . '.' . $image->clientExtension();
        $image->move($path_file, $imageName);
        $array[0] = '/files/' . $path . '/' . $imageName;
        $array[1] = $imageName;
        return $array;
    }

    /**
     * Проверка на наличие папки и ее создание в случае отсутствия
     *
     * @param $path
     */
    public static function checkDir($path)
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }

}
