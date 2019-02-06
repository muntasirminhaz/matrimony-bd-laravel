<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model
{
    protected $table = 'profile_search';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
