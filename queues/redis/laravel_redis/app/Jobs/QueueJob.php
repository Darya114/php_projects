<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class QueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $message)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log::info("Сообщение из очереди: {$this->message}");
        try {
            Log::info("Сообщение из очереди: {$this->message}");
        } catch (\Throwable $e) {
            Log::error("Ошибка при выполнении QueueJob: {$e->getMessage()}", [
                'exception' => $e,
            ]);
        }
    }
}
