<?php
namespace App\Enums;

enum AccreditationEnum: string
{
    case NOT_ACCREDITED = 'NOT_ACCREDITED';
    case SINTA_1 = 'SINTA_1';
    case SINTA_2 = 'SINTA_2';
    case SINTA_3 = 'SINTA_3';
    case SINTA_4 = 'SINTA_4';
    case SINTA_5 = 'SINTA_5';
    case SINTA_6 = 'SINTA_6';

    // Function to get the index of the enum value
    public static function getIndex(string $accreditation): int
    {
        // Get all the enum values
        $values = self::values();

        // Use array_search to get the index of the accreditation value, or return 0 if not found
        return array_search(str_replace(' ', '_', $accreditation), $values) ?: 0;
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
