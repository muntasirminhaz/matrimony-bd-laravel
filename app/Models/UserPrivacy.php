<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrivacy extends Model
{
    protected $table = 'users_privacy';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
