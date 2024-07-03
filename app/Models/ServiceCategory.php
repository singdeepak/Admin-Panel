<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "service_categories";
    protected $guarded = [];


    public function services(){
        return $this->hasMany(Service::class, 'service_category_id');
    }
}
