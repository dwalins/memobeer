<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the user that owns the beer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
