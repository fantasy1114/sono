<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Keys';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Key_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Key_Name',
                  'Employee_ID',
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
     * Get the key for this model.
     *
     * @return App\Models\Key
     */
    public function key()
    {
        return $this->belongsTo('App\Models\Key','Key_ID');
    }

    /**
     * Get the Employee for this model.
     *
     * @return App\Models\Employee
     */
    public function Employee()
    {
        return $this->belongsTo('App\Models\Employee','Employee_ID','Employee_ID');
    }

    /**
     * Set the Date_From.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateFromAttribute($value)
    {
        $this->attributes['Date_From'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the Date_Till.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateTillAttribute($value)
    {
        $this->attributes['Date_Till'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get Date_From in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateFromAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

    /**
     * Get Date_Till in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateTillAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
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
