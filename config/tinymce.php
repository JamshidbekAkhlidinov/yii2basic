<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 20:49:23
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */


return [
    'plugins' => [
        'anchor', 'charmap', 'code', 'help', 'hr',
        'image', 'link', 'lists', 'media', 'paste',
        'searchreplace', 'table','fullscreen',
    ],
    'height' => 800,
    'convert_urls' => false,
    'element_format' => 'html',
    'image_caption' => true,
    'keep_styles' => false,
    'paste_block_drop' => true,
    'table_default_attributes' => new yii\web\JsExpression('{}'),
    'table_default_styles' => new yii\web\JsExpression('{}'),
    'invalid_elements' => 'acronym,font,center,nobr,strike,noembed,script,noscript',
    'extended_valid_elements' => 'strong/b,em/i,table[style]',
    // elFinder file manager https://github.com/alexantr/yii2-elfinder
    'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['/admin/file/default/tinymce']),
];