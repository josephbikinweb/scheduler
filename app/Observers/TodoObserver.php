<?php
namespace App\Observers;

use App\Models\Todo;
use App\Models\TodoLog;

class TodoObserver
{
    public function updating(Todo $todo): void
    {
        // cek kalau status berubah

        if ($todo->isDirty('status')) {
            if ($todo->status == Todo::IN_PROGRESS) {
                TodoLog::create([
                    'todo_id' => $todo->id,
                    'action'  => 'started',
                ]);
            }

            if ($todo->status == Todo::DONE) {
                TodoLog::create([
                    'todo_id' => $todo->id,
                    'action'  => 'completed',
                ]);
            }

            if ($todo->status == Todo::NEEDS_REVISION) {
                TodoLog::create([
                    'todo_id' => $todo->id,
                    'action'  => 'revised',
                ]);
            }
        }
    }
    /**
     * Handle the Todo "created" event.
     */
    public function created(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "updated" event.
     */
    public function updated(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "deleted" event.
     */
    public function deleted(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "restored" event.
     */
    public function restored(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "force deleted" event.
     */
    public function forceDeleted(Todo $todo): void
    {
        //
    }
}
