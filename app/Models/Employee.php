<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Employees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Employee_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Employee_Name',
                  'Employee_Phone',
                  'Is_Active',
                  'Organisation_ID'
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
     * Get the Organisation for this model.
     *
     * @return App\Models\Organisation
     */
    public function Organisation()
    {
        return $this->belongsTo('App\Models\Organisation','Organisation_ID','Organisation_ID');
    }

    /**
     * Get the employee for this model.
     *
     * @return App\Models\Employee
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','Employee_ID');
    }

    /**
     * Get the key for this model.
     *
     * @return App\Models\Key
     */
    public function key()
    {
        return $this->hasOne('App\Models\Key','Employee_ID','Employee_ID');
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
