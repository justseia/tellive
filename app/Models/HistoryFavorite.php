<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class HistoryFavorite extends Model
{
    use HasUuids;

    protected $guarded = [];
}
