<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'faqs';

    /**
     * @var array
     */
    protected $guarded = [];
}
