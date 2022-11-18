<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $fillable=['title','description','phone'];
    public $timestamps=false;


}
