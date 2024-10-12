<?php declare(strict_types=1);

namespace Modules\Staff\Enums\employee;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const active = 'active';
    const OnLeave = 'on_leave';
}
