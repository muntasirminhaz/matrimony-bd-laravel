<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDirectContact extends Model
{
    protected $table = 'users_contact';
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
