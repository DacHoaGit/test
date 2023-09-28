<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusAttendanceEnum extends Enum
{
    const NOT_ATTENDANCE = 0;
    const NOT_CHECK_OUT = 1;
    const FULL_TIME = 2;
    const PART_TIME = 3;
    const OVER_TIME = 4;
}
