<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function insert(Request $request)
    {
        $element = Claim::createClaim($request);
        return response()->json(compact('element'));
    }

    public function get()
    {
        $claim = Claim::getClaims();
        return $claim;
    }

    //Удаление заявок
    public function delete($id)
    {
        Claim::deleteClaim($id);
        return response()->json();
    }

}
