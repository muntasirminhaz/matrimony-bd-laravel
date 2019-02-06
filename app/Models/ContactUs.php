<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';    
    protected $guarded = ['id']; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
