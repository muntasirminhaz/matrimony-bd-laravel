<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    protected $table = 'users_reported';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
