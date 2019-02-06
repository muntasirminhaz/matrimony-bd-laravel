<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $table = 'users_interests';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
