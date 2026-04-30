<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasUlids;

    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'status_code',
        'url',
        'referer',
        'method',
        'response_time',
        'is_bot',
        'visited_at',
    ];

    public function detail()
    {
        return $this->hasOne(VisitorDetail::class);
    }
}
