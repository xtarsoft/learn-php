<?php
global $arguments;

const MODEL_CONTENT = <<<PHP
<?php

namespace Models;

use Core\Model;

final class %s extends Model
{
    protected \$table = '%s';
}
PHP;

/**
 * @param string $name
 * @return string
 */
function refactorName(string $name): string
{
    if (!str_ends_with($name, 's')) {
        $name .= 's';
    }
    return ucfirst($name);
}

if (count($arguments) < 1) {
    echo warning('Please provide a model name');
    echo info('Example: php justin new:model <model_name>');
    exit(1);
}

$model_name = $arguments[0];
$model_file = refactorName($model_name);
$file_name = "./models/{$model_file}.php";

if (file_exists($file_name)) {
    echo error("Model {$model_name} already exists!");
    exit(1);
}

$content = sprintf(MODEL_CONTENT, $model_file, strtolower($model_file));

if (file_put_contents($file_name, $content)) {
    echo success("Model {$model_name} created successfully!");
} else {
    echo error("Failed to create model {$model_name}");
    exit(1);
}