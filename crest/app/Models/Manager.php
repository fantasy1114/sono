<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Managers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Manager_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Manager_Name',
                  'Manager_Email',
                  'Manager_Phone',
                  'Is_Active',
                  'Organisation_ID',
                  'Manager_Password'
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
     * Get the manager for this model.
     *
     * @return App\Models\Manager
     */
    public function manager()
    {
        return $this->belongsTo('App\Models\Manager','Manager_ID');
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
