<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorDetail extends Model
{
    protected $primaryKey = 'visitor_log_id';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'visitor_log_id',
        'user_agent',
        'country_code',
        'country_name',
        'city',
        'region',
        'postal_code',
        'latitude',
        'longitude',
        'timezone',
        'operating_system',
        'browser',
        'browser_version',
        'platform',
        'device',
    ];

    public function log()
    {
        return $this->belongsTo(VisitorLog::class);
    }
}
