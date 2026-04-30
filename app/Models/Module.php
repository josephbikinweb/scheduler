<?php
namespace App\Models;

use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'version_id',
        'module_name',
        'module_description',
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
