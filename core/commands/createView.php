<?php
global $arguments;

const VIEW_CONTENT = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>%s</title>
</head>
<body>
    <h1>%s</h1>
</body>
</html>
HTML;

if (count($arguments) < 1) {
    echo warning('Please provide a view name');
    echo info('Example: php jusmin new:view <view_name>');
    exit(1);
}

$view_name = $arguments[0];
$file_name = "./views/{$view_name}.view.php";

if (file_exists($file_name)) {
    echo error("View {$view_name} already exists!");
    exit(1);
}

$content = sprintf(VIEW_CONTENT, $view_name, $view_name);

if (file_put_contents($file_name, $content)) {
    echo success("View {$view_name} created successfully!");
} else {
    echo error("Failed to create view {$view_name}");
    exit(1);
}