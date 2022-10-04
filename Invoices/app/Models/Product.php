<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name','section_id','description'
    ];

    public function section(){
       return $this->belongsTo(Section::class,'section_id');
    }
}
