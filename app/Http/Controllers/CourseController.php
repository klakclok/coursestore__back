<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //Добавление курса
    public function insert(Request $request)
    {
        $course = Course::createCourse($request);
        return response()->json(compact('course'));
    }

    //Редактирование курса
    public function update(Request $request)
    {
        $course = Course::updateCourse($request);
        return response()->json(compact('course'));
    }

    //Удаление курса
    public function delete($id)
    {
        Course::deleteCourse($id);
        return response()->json();
    }

    //Выдать все курсы
    public function getCourses()
    {
        $course = Course::getCourses();
        return $course;
    }

    //Выдать один курс
    public function getCourse($id)
    {
        $course = Course::getOneCourse($id);
        return response()->json(compact('course'));
    }
}
