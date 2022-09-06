<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;
    const table = 'img';
    protected $table = self::table;

    protected $fillable = [
        'path',
        'origin_name',
        'alt',
        'size',
        'type',
    ];


    static public function saveImg($img_url, $name, $alt = null, $size = null)
    {
        $img = new Img();
        $img->path = $img_url;
        $img->origin_name = $name;
        $img->alt = $alt;
        $img->size = $size;
        $img->save();
        return $img->id;
    }


}
