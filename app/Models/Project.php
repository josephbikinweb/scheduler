<?php
namespace App\Models;

use App\Enums\ProjectStatus;
use App\Models\Techstack;
use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'project_name',
        'project_description',
        'start_date',
        'end_date',
        'deploy_date',
        'status',
        'repository_url',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
    ];
    public function versions()
    {
        return $this->hasMany(Version::class);
    }
    public function techstacks()
    {
        return $this->hasMany(Techstack::class);
    }

}
