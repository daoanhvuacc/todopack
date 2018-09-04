<?php

namespace EricDao\TodoPack\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'acc__tasks';

    protected $fillable = [
        'name',
    ];
}
