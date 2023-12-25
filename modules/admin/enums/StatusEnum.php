<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:41:49
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\enums;

interface StatusEnum
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public const ALL = [
        self::ACTIVE => "Active",
        self::INACTIVE => "Inactive",
    ];
}