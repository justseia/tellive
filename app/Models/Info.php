<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasUuids;

    protected $guarded = [];
}
