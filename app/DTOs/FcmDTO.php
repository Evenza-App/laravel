<?php

namespace App\DTOs;

readonly class FcmDTO
{
    public function __construct(
        private string $token,
        private string $title,
        private string $body,
        private ?array $data = null,
        private ?string $image = null,
        private string $clickAction = 'FLUTTER_NOTIFICATION_CLICK',
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'token' => $this->token,
            'notification' => [
                'title' => $this->title,
                'body' => $this->body,
            ],
            'android' => [
                'notification' => [
                    'click_action' => $this->clickAction,
                    'title' => $this->title,
                    'body' => $this->body,
                    'image' => $this->image,
                ],
            ],
            'apns' => [
                'fcm_options' => [
                    'image' => $this->image,
                ],
            ],
        ];

        if ($this->data) {
            $array['data'] = $this->data;
        }

        return $array;
    }
}
