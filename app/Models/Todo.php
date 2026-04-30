<?php
namespace App\Models;

use App\Enums\TodoPriority;
use App\Enums\TodoStatus;
use App\Models\TodoLog;
use App\Models\TodoStat;
use App\Models\Version;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'version_id',
        'todo_name',
        'todo_description',
        'status',
        'priority',
        'assigned_to',
        'due_date',
        'completed_date',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];

    protected $casts = [
        'status'   => TodoStatus::class,
        'priority' => TodoPriority::class,
    ];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
    public function todostats()
    {
        return $this->hasMany(TodoStat::class);
    }
    public function todologs()
    {
        return $this->hasMany(TodoLog::class);
    }
}
