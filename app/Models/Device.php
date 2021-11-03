<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'devices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Device_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Tracker_Code',
                  'Worksite_ID',
                  'Is_Active'
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
     * Get the device for this model.
     *
     * @return App\Models\Device
     */
    public function device()
    {
        return $this->belongsTo('App\Models\Device','Device_ID');
    }

    /**
     * Get the Worksite for this model.
     *
     * @return App\Models\Worksite
     */
    public function Worksite()
    {
        return $this->belongsTo('App\Models\Worksite','Worksite_ID','Worksite_ID');
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
