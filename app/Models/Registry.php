<?php

namespace App\Models;

use DateTimeZone;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Registry extends Model
{
    // Sortable added by Yuris
    use Sortable;

    public $sortable = ['Key_Name','Action_Time','Battery_State','Action','Employee_Name','Worksite_Name', 'Signal_Level'];
    
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
    #protected $table = 'Registry';
    protected $table = 'Event_Log_View';

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
                  'Battery_State',
                  'Signal_Level'
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
        #return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
        #Latvian date format per Mantis#14
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);
        $date->setTimezone(new DateTimeZone('Europe/Riga'));
        return $date->format('d.m.Y H:i:s');
    }

}
