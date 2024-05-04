<?php

namespace App\Enums;

enum ReservationStatusEnum
{
    case Pending;

    case Rejected;

    case NeedPayment;

    case Accepted;
}
