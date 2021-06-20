<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $fillable = [
    'title',
    'n_rooms',
    'n_beds',
    'n_bathrooms',
    'mq',
    'address',
    'latitude',
    'longitude',
    'img',
    'visible',
    'user_id'
  ];


  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  public function services()
  {
    return $this->belongsToMany(Service::class);
  }

  public function messages()
  {
    return $this->hasMany(Message::class);
  }

  public function views()
  {
    return $this->hasMany(View::class);
  }

  public function sponsors()
  {
    return $this->belongsToMany(Sponsor::class);
  }
}
