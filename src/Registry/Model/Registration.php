<?php

namespace WeTyper\Registry\Model;

use WeTyper\Foundation\Database\Model;

class Registration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registry_registration';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'json'
    ];
}
