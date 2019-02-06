<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $table = 'users_photos';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
