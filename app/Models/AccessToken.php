<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    protected $connection = 'mysql';
    protected $table = 'permission_access_tokens';
    protected $primaryKey = 'id';
}
