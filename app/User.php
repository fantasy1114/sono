<?php

namespace App;

use App\Models\Organisation;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'organisation_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # Organisation stuff added by Yuris
     /**
     * Get the Organisation for this model.
     *
     * @return App\Models\Organisation
     */
    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation','organisation_id','Organisation_ID');
    }

    #Shortcode for returning Organisation name of the user
    public function org_name() {
        if ((isset($this->organisation)) and ($this->organisation instanceof Organisation))
            return $this->organisation->Organisation_Name;
        else
            return null;
    }

    # Added by Yuris: This is not the right place for HTML-specific method, 
    # will need to put it somewhere else later
    public function renderOrgName() {
        if ($this->is_superuser) {
            return '<span class="">' . 'All Organisations' . '</span>';
        }
        elseif  (isset($this->organisation_id)) {
            return '<span class="grey-text text-lighten-2">' . $this->organisation->Organisation_Name . '</span>';
        }
        else {
            return '<span class="grey-text">' . 'UNASSIGNED' . '</span>';
        }
    }
}
