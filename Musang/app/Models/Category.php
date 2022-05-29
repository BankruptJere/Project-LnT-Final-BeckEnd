<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    // Menentukan field yg boleh di masukkan ke dalam table
    protected $fillable = ['category_name'];

    // Menentukan field yg tidak boleh dimasukkan ke dalam table
    // protected $guarded = ['id'];


    // RELATIONSHIP
    public function item(){
        return $this->hasMany('App\Models\Item', 'category_id');
    }
}
