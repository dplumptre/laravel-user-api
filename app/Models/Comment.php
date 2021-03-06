<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $table = 'comments';


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
