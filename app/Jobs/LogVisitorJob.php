<?php
namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class LogVisitorJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected array $data,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(\App\Services\VisitorLogger::class)
            ->handle($this->data);
    }
}
