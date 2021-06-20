<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'apartment_id',
        'ip_address'
    ];

    public function apartment()
  {
    return $this->belongsTo(Apartment::class);
  }
}
