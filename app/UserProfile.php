<?php

namespace App;
use App\Country;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $guarded = [];

    // one to one inverse  // user_profiles table ma country_id par thi country name get karava
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }
}
