<?php declare(strict_types=1);

namespace Modules\Service\Enums\surgical_operation;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Scheduled = 'scheduled';
    const InProgress = 'in_progress';
    const Completed = 'completed';
}
