<?php

$dir = "/root/vuln-labs/rfi/secret/";

if (is_dir($dir)) {

    $files = scandir($dir);

    echo "<h2>Files:</h2>";

    foreach ($files as $file) {

        if ($file != "." && $file != "..") {

            echo $file . "<br>";

            $path = $dir . $file;

            if (is_file($path)) {

                echo "<pre>";
                echo htmlspecialchars(file_get_contents($path));
                echo "</pre>";
            }
        }
    }

} else {

    echo "Directory not found";
}
?>
