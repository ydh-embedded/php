<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ArticName'         ,
        'ArticName_id_ref'  ,
        'ArticContent'      ,
        'ArticDescription'  ,
        'ArticPicture'      ,
        'ArticThumbnail'    ,
    ];
}
