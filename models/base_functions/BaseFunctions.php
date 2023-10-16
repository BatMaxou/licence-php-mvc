<?php

function presentArray(array $array, string $modifier = ''): void
{
    if (empty($array)) {
        return;
    }

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            echo $key . ' : ' . "\n";
            presentArray($value, "\t");
        } else {
            echo $modifier . $key . ' : ' . $value . "\n";
        }
    }
}

function dd($value)
{
    echo '<pre>';
    if ('array' === gettype($value)) {
        presentArray($value);
    } elseif ('string' === gettype($value) || 'int' === gettype($value)) {
        echo $value;
    } else {
        var_dump($value);
    }
    echo '</pre>';
    die;
}

function verifyConnection()
{
    if (!isset($_SESSION['login'])) {
        header('Location: /?page=/');
    }
}
