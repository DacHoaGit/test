<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class ActionEnum extends Enum
{
    const CARD = 0;
    const FACIAL = 1;
    const FINGERPRINT = 2;
}
