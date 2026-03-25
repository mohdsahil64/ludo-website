<?php
$file = '/home/radhykay/apk_files/ludo.apk';

if (file_exists($file)) {
    header('Content-Type: application/vnd.android.package-archive');
    header('Content-Disposition: attachment; filename="ludo.apk"');
    readfile($file);
} else {
    header("HTTP/1.0 404 Not Found");
    echo "APK file not found. Please contact support.";
}