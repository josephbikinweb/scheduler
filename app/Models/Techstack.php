<?php
namespace App\Models;

use App\Models\Project;
use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Techstack extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'language',
        'language_version',
        'framework',
        'framework_version',
        'runtime',
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
