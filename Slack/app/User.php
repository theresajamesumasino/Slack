<?php

namespace App;

use App\Notifications\QuoteTest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot()
    {
        parent::boot();

        self::created(function($model) {
            $model->notify(new QuoteTest());
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /** 
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationFor($driver)
    {
        return "https://hooks.slack.com/services/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";
    }
}
