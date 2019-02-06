<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileView extends Model
{
    protected $table = 'users_profile_viewed';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
