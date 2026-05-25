<?php

$dir = "/var/www/html/rfi/secret/flag.txt";

if (is_dir($dir)) {

    $files = scandir($dir);

    foreach ($files as $file) {

        if ($file != "." && $file != "..") {

            $path = $dir . $file;

            echo "<h3>$file</h3>";

            echo "<pre>";
            echo htmlspecialchars(file_get_contents($path));
            echo "</pre>";
        }
    }

} else {

    echo "Directory not found";

}
?>
