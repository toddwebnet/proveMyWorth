<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'city', 'state', 'zip'
    ];

    public function fullAddress()
    {
        return str_replace("  ", "  ",
            $this->street . " " .
            $this->city . ", " .
            $this->state . " " .
            $this->zip
        );

    }
}
