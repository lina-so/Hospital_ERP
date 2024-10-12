<?php declare(strict_types=1);

namespace Modules\Hospital\Enums\room;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Available = 'available';
    const Occupied = 'occupied';
    const Maintenance = 'maintenance';
}
