<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ='categories';
    protected $fillable = [
        'title'
    ];

    //Создание категории
    public static function createCategory($request)
    {
        $category = new Category();
        $category->title=$request->title;

        $category->save();
        return $category;
    }

    //Обновление категории
    public static function updateCategory($request)
    {
        $category = self::where('id', $request->id)->first();
        $category->title = $request->title;

        $category->save();
        return $category;
    }

    //Удаление категории
    public static function deleteCategory($id)
    {
       self::where('id', $id)->delete();
    }

    //Выдать все категории
    public static function getCategory()
    {
        return Category::get();
    }


    //Связка с курсами
    public function joinCourse()
    {
        return $this->belongsToMany(Course::class,'category_id');
    }

}
