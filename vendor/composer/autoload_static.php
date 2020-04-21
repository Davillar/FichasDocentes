<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2402fb75b018f9f4af8a2d9019c61e4
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
            'Svg\\' => 4,
        ),
        'F' => 
        array (
            'FontLib\\' => 8,
        ),
        'D' => 
        array (
            'Dompdf\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Svg\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-svg-lib/src/Svg',
        ),
        'FontLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-font-lib/src/FontLib',
        ),
        'Dompdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/dompdf/dompdf/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Sabberworm\\CSS' => 
            array (
                0 => __DIR__ . '/..' . '/sabberworm/php-css-parser/lib',
            ),
        ),
        'P' => 
        array (
            'Pandoc' => 
            array (
                0 => __DIR__ . '/..' . '/ryakad/pandoc-php/src',
            ),
        ),
    );

    public static $classMap = array (
        'Dompdf\\Cpdf' => __DIR__ . '/..' . '/dompdf/dompdf/lib/Cpdf.php',
        'HTML5_Data' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Data.php',
        'HTML5_InputStream' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/InputStream.php',
        'HTML5_Parser' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Parser.php',
        'HTML5_Tokenizer' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
        'HTML5_TreeBuilder' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
        'Pandoc\\Pandoc' => __DIR__ . '/..' . '/ondrs/pandoc-php/src/Pandoc/Pandoc.php',
        'Pandoc\\PandocException' => __DIR__ . '/..' . '/ondrs/pandoc-php/src/Pandoc/PandocException.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2402fb75b018f9f4af8a2d9019c61e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2402fb75b018f9f4af8a2d9019c61e4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd2402fb75b018f9f4af8a2d9019c61e4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd2402fb75b018f9f4af8a2d9019c61e4::$classMap;

        }, null, ClassLoader::class);
    }
}