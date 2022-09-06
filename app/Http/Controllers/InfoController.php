<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function insert(Request $request)
    {
        $element = Info::createInfo($request);
        return response()->json(compact('element'));
    }

    public function update(Request $request)
    {
        $element = Info::updateInfo($request);
        return response()->json(compact('element'));
    }

    public function delete($id)
    {
        Info::deleteInfo($id);
        return response()->json();
    }

    public function get()
    {
        $element = Info::getInfo();
        return $element;
    }
}
