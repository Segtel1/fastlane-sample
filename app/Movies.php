<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //

    protected $guarded = [];


    public function cinema_branches()
    {
        return $this->belongsTo(CinemaBranch::class,'branch_id');
    }
}
