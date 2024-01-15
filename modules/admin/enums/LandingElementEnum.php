<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:26:27
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface LandingElementEnum
{
    public const HEADER = 1000;

    public const HEADER_TITLE = 1100;


    public const CREATE_TITLE = 1500;

    public const SERVICE = 2000;
    public const SERVICE_TITLE = 2200;
    public const QUESTION = 3000;

    public const MULTIPLE_ENUMS = [
        self::SERVICE,
        self::QUESTION,
    ];


    /**
     * id
     * key
     * title
     * icon
     * description
     * sub_text
     * value
     * files
     * url
     * order
     */

}