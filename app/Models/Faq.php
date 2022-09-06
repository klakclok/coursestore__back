<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = [
        'title',
        'description',
    ];
    use HasFactory;
    public static function createInfo($request)
    {
        $element = new Faq();
        $element->title = $request->title;
        $element->description = $request->description;

        $element->save();
        return $element;
    }

    public static function updateInfo($request)
    {
        $element = self::where('id', $request->id)->first();
        $element->title = $request->title;
        $element->description = $request->description;

        $element->save();
        return $element;
    }

    public static function deleteInfo($id)
    {
        self::where('id', $id)->delete();
    }

    public static function getInfo()
    {
        return Faq::get();
    }
}
