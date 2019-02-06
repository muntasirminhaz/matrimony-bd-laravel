<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';    
    protected $guarded = ['id']; // all fillable exccept  ['id', 'created_at', 'updated_at']

}
