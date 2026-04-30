<?php
namespace App\Models;

use App\Enums\VersionStatus;
use App\Models\Project;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'project_id',
        'version_name',
        'release_date',
        'changelog',
        'isStable',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];
    protected $casts = [
        'status' => VersionStatus::class,
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
