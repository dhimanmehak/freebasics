<?php

/*
 * Requirements for fundstarter
 */

// PHP version >= 5.4

$phpversion = PHP_VERSION;
if ($phpversion < 5.4) {
    echo "PHP version of your server should be >=5.4. The current version is " . $phpversion;
    die;
}

//gd extension to be enabled for captcha

$testGD = get_extension_funcs("gd");
if (!$testGD) {
    echo "GD library not installed. Enable php_gd2.dll extension in php.ini";
    die;
}

//Fileinfo extensions to be enbled for image upload

$testFileinfo = get_extension_funcs("fileinfo");
if (!$testFileinfo) {
    echo "Fileinfo not installed. Enable php_fileinfo.dll extension in php.ini";
    die;
}

//Mbstring extensions to be enabled for manage multibyte encodings
$testMbstring = get_extension_funcs("mbstring");
if (!$testMbstring) {
    echo "Mbstring not installed. Enable php_mbstring.dll extension in php.ini";
    die;
}


//777 permission to Lang folder
$folder = __DIR__ . '/app/lang';
$dir_writable = substr(sprintf('%o', fileperms($folder)), -4) == "0777" ? "true" : "false";
if ($dir_writable == "false") {
    echo "Change permission of the folder(app/lang) to writable(777).";
    die;
}
?>