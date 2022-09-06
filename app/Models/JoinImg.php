<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinImg extends Model
{
    use HasFactory;

//    const table = 'JoinImg';
//    protected $table = self::table;
    protected $table = 'join_img';
    const table = 'join_img';
    protected $fillable = array('*');



    //связь с Img
    public function img()
    {
        return $this->belongsTo(Img::class, "img_id", "id");
    }

    //Сохраняем фото в бд
    public static function saveImg($img_url, $img_name, $item_id, $alt = null, $size = null)
    {
        $img_id = Img::saveImg($img_url, $img_name, $alt, $size);
        $img_tour = new JoinImg();
        $img_tour->item_id = $item_id;
        $img_tour->img_id = $img_id;
        $img_tour->save();
    }


    //Удаление главной фотографии
    public static function deleteImg($item_id)
    {
        JoinImg::where([
            ['item_id', $item_id],
        ])->delete();

       // Img::updateImg();
    }

}
