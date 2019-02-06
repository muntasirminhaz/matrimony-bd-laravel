<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRelative extends Model
{
    protected $table = 'users_relaives';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
