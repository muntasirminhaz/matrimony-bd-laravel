<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $table = 'users_education';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
