<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'admin_diary';    
    protected $guarded = ['created_at', 'updated_at']; // fillable acepet  ['id', 'created_at', 'updated_at']
}
