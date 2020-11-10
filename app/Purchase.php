<?php

namespace App;
use App\Product;
use App\User;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);

        //return $this->belongsToMany(Role::class, 'role_user', 'user_id','role_id', 'id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
