<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Registry';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Registry_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Key_Name',
                  'Action',
                  'Action_Time',
                  'Battery_State'
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
     * Get the registry for this model.
     *
     * @return App\Models\Registry
     */
    public function registry()
    {
        return $this->belongsTo('App\Models\Registry','Registry_ID');
    }

    /**
     * Set the Action_Time.
     *
     * @param  string  $value
     * @return void
     */
    public function setActionTimeAttribute($value)
    {
        $this->attributes['Action_Time'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get Action_Time in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getActionTimeAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
