<?php
namespace App\Models;

use App\Models\Project;
use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backup extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'project_id',
        'version_id',
        'backup_date',
        'notes',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
