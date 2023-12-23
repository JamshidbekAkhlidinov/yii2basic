<?php
/*
 *   Jamshidbek Akhlidinov
 *   24 - 12 2023 0:29:11
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface LanguageEnum
{
    public const EN = 'en';
    public const RU = 'ru';
    public const UZ = 'uz';

    public const LABELS = [
        self::EN => "English",
        self::RU => "Russian",
        self::UZ => "Uzbek",
    ];

    public const ICONS = [
        self::EN => "fa fa-globe",
        self::RU => "fa fa-globe",
        self::UZ => "fa fa-globe",
    ];
}