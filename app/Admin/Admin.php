<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';    
    protected $guarded = ['created_at', 'updated_at']; // fillable acepet  ['id', 'created_at', 'updated_at']
}
