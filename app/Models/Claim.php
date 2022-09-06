<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims';
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone',
        ];

    public static function createClaim($request)
    {
        $claim = new Claim();
        $claim->name = $request->name;
        $claim->surname = $request->surname;
        $claim->patronymic = $request->patronymic;
        $claim->phone = $request->phone;

        $claim->save();
        return $claim;
    }

    public static function getClaims()
    {
        return Claim::get();
    }

    //Удаление курса
    public static function deleteClaim($id)
    {
        self::where('id', $id)->delete();
    }
}
