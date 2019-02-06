<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';    
    protected $guarded = ['created_at', 'updated_at']; // fillable acepet  ['id', 'created_at', 'updated_at']


}
