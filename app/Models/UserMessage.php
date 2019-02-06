<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'users_messages';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']

    

}
