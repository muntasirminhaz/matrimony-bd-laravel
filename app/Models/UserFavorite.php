<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $table = 'users_favorite';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
