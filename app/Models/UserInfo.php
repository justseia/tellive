<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasUuids;

    protected $guarded = [];
}
