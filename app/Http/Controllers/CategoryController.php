<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Добавление категории
    public function insert(Request $request)
    {
        $category = Category::createCategory($request);
        return response()->json(compact('category'));
    }

    //Редактирование категории
    public function update(Request $request)
    {
        $category = Category::updateCategory($request);
        return response()->json(compact('category'));
    }

    //Удаление категории
    public function delete($id)
    {
        Category::deleteCategory($id);
        return response()->json();
    }

    //Выдать все категории
    public function getCategory()
    {
        $category = Category::getCategory();
        return $category;
    }
}
