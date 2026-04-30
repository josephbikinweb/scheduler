<?php
namespace App\Models;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoStat extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'todo_id',
        'average_minutes',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
    ];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
