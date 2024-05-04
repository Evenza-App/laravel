<?php

namespace App\Jobs;

use App\DTOs\FcmDTO;
use App\Models\Event;
use App\Helpers\FcmHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendFcmWhenAddNewEventJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Event $event)
    {
        //
    }
    private function getTitle(): string
    {
        return $this->event->name;
    }

    private function getBody(): string
    {
        return ' تم إضافة مناسبة جديدة';
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FcmHelper::sendToTopic(
            topic: 'all',
            title: $this->getTitle(),
            body: $this->getBody(),
            image: asset('storage/' . $this->event->image),
        );
    }
}
