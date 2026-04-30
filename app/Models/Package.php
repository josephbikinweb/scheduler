<?php
namespace App\Models;

use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'version_id',
        'package_name',
        'package_version',
        'package_description',
        'install_via',
        'notes',
        'type',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];
    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
