<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Organisations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Organisation_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Organisation_Name'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the organisation for this model.
     *
     * @return App\Models\Organisation
     */
    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation','Organisation_ID');
    }

    /**
     * Get the employees for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee','Organisation_ID','Organisation_ID');
    }

    /**
     * Get the manager for this model.
     *
     * @return App\Models\Manager
     */
    public function manager()
    {
        return $this->hasOne('App\Models\Manager','Organisation_ID','Organisation_ID');
    }

    /**
     * Get the worksite for this model.
     *
     * @return App\Models\Worksite
     */
    public function worksite()
    {
        return $this->hasOne('App\Models\Worksite','Organisation_ID','Organisation_ID');
    }


    /**
     * Get Created_At in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get Updated_At in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
