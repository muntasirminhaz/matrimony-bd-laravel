<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMostFavorite extends Model
{
    protected $table = 'users_most_favorite';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
