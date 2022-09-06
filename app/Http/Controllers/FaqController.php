<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function insert(Request $request)
    {
        $element = Faq::createInfo($request);
        return response()->json(compact('element'));
    }

    public function update(Request $request)
    {
        $element = Faq::updateInfo($request);
        return response()->json(compact('element'));
    }

    public function delete($id)
    {
        Faq::deleteInfo($id);
        return response()->json();
    }

    public function get()
    {
        $element = Faq::getInfo();
        return $element;
    }
}
