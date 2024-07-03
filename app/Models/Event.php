<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "events";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'added_by');
    }

}
