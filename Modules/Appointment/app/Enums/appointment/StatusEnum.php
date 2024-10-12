<?php declare(strict_types=1);

namespace Modules\Appointment\Enums\appointment;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Upcoming = 'upcoming';
    const Completed = 'completed';
    const Canceled = 'canceled';
}
