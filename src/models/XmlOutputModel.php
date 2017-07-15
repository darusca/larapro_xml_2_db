<?php

namespace Eon\Dario;

use Illuminate\Database\Eloquent\Model;

class XmlOutputModel extends Model
{
    protected $table = 'output';

    protected $fillable = [
        'title',
        'description',
        'launch_url',
        'icon_url'
    ];
}
