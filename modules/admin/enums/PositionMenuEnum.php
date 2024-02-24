<?php

namespace app\modules\admin\enums;

interface PositionMenuEnum
{
    public const HEADER = 111;
    public const TOP = 222;

    public const FOOTER_LINKS = 333;
    public const FOOTER_EXPLORE = 444;

    public const SIDEBAR_1 = 555;
    public const SIDEBAR_2 = 666;

    public const LABELS = [
        self::HEADER => "Header menu",
        self::TOP => "Top menu",
        self::SIDEBAR_1 => "Sidebar 1",
        self::SIDEBAR_2 => "Sidebar 2",
        self::FOOTER_LINKS => "Footer Links",
        self::FOOTER_EXPLORE => "Footer Additional",
    ];

    public const ALL = [
        self::HEADER => "Header",
        self::TOP => "Top",
        self::FOOTER_LINKS => "Footer links",
        self::FOOTER_EXPLORE => "Footer explore",
        self::SIDEBAR_1 => "Sidebar 1",
        self::SIDEBAR_2 => "Sidebar 2",
    ];
}