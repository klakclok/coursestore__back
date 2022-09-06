<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const table = 'courses';
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
    ];

    //Добавление курса
    public static function createCourse($request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->category_id = $request->category_id;

        $course->save();

        if (isset($request->image)) {
            $image =  Upload::uploadImage($request->image,null);
            JoinImg::saveImg($image[0], $image[1], $course->id);

            return $course;

        }
    }

    //Редактирвания курса
    public static function updateCourse($request)
    {
        $course = self::where('id', $request->id)->first();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->category_id = $request->category_id;

        $course->save();

        //Если загрузили новую главную фотографию
        if (isset($request->image)) {
            /**
             * Загрузка главной фотографии
             */
            //Удаление главной фотографии
            JoinImg::deleteImg($request['id']);
            $image =  Upload::uploadImage($request->image,null);
            JoinImg::saveImg($image[0], $image[1], $course->id);
        }
    }

    //Удаление курса
    public static function deleteCourse($id)
    {
        self::where('id', $id)->delete();
    }

    //Выдать все курсы
    public static function getCourses()
    {
        return self::with(['headImg.img','joinCategory'])->get();
    }

    //Выдать один курс
    public static function getOneCourse($id)
    {
        return Course::where('id', $id)->first();
    }


    public function img()
    {
        return $this->belongsTo(JoinImg::class, "id", "item_id");
    }

    /**
     * Получение главной фотографии
     */
    public function headImg()
    {
        return $this->belongsTo(JoinImg::class, "id", "item_id");
    }

    //Связка с категорией
    public function joinCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}

