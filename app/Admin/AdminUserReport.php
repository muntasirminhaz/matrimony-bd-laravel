<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUserReport extends Model
{
    protected $table = 'users_reported';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
