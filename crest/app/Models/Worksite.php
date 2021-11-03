<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worksite extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Worksites';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Worksite_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'Worksite_Name',
                  'Worksite_Address',
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
     * Get the worksite for this model.
     *
     * @return App\Models\Worksite
     */
    public function worksite()
    {
        return $this->belongsTo('App\Models\Worksite','Worksite_ID');
    }

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
