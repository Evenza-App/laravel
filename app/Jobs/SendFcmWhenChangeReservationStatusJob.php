<?php

namespace App\Jobs;

use App\DTOs\FcmDTO;
use App\Enums\ReservationStatusEnum;
use App\Helpers\FcmHelper;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendFcmWhenChangeReservationStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public ReservationStatusEnum $status, public int $userId)
    {
        //
    }

    private function getTitle(): string
    {
        if ($this->status == ReservationStatusEnum::Rejected) {
            return 'رفض الحجز';
        }
        if ($this->status == ReservationStatusEnum::NeedPayment) {
            return 'الدفع';
        }
        if ($this->status == ReservationStatusEnum::Accepted) {
            return ' قبول الحجز';
        }
        if ($this->status == ReservationStatusEnum::Pending) {
            return ' معالجة الحجز';
        }
    }

    private function getBody(): string
    {
        if ($this->status == ReservationStatusEnum::Pending) {
            return 'حجزك الان قيد المعالجة ....';
        }
        if ($this->status == ReservationStatusEnum::Rejected) {
            return 'نعتذر لقد تم رفض حجزك';
        }
        if ($this->status == ReservationStatusEnum::NeedPayment) {
            return 'تم معالجة حجزك الرجاء الدفع';
        }
        if ($this->status == ReservationStatusEnum::Accepted) {
            return 'تهانينا تم قبول حجزك بنجاح';
        }
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::find($this->userId);

        $dtos = [];

        foreach ($user->fcmTokens()->pluck('token') as $token) {
            $dtos[] = new FcmDTO(
                token: $token,
                title: $this->getTitle(),
                body: $this->getBody(),
            );
        }

        FcmHelper::send(...$dtos);
    }
}
