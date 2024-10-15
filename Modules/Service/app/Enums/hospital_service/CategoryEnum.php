<?php declare(strict_types=1);

namespace Modules\Service\Enums\hospital_service;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CategoryEnum extends Enum
{
    const Imaging = 'Imaging';
    const LabTest = 'Lab_Test';
    const Surgery = 'Surgery';
    const MedicalInterventions = 'medical_interventions'; // التدخلات الطبية
}
