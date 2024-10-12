<?php declare(strict_types=1);

namespace Modules\Service\Enums\patient_service;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Pending = 'pending';
    const Completed = 'completed';
}
