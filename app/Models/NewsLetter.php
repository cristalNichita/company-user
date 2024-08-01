<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;

class NewsLetter extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_letters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];
}
