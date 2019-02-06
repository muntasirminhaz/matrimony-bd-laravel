<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentPackage extends Model
{
    protected $table = 'current_package';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
    
}
