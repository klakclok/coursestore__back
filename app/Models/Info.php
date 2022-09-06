<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $fillable = [
        'users',
        ];

    //Добавление информации
    public static function createInfo($request)
    {
        $element = new Info();
        $element->users = $request->users;

        $element->save();
        return $element;
    }

    //Редактирование информации
    public static function updateInfo($request)
    {
        $element = self::where('id', $request->id)->first();
        $element->users = $request->users;

        $element->save();
        return $element;
    }

    //Удаление информации
    public static function deleteInfo($id)
    {
     self::where('id', $id)->delete();
    }

    //Получение информации
    public static function getInfo()
    {
        return Info::get();
    }
}
