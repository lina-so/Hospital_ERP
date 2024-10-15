<?php declare(strict_types=1);

namespace Modules\Service\Enums\hospital_service;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Available = 'available';
    const Unavailable = 'unavailable';

}
