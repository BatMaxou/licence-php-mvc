<?php

function presentArray(array $array, string $arrayKey = null): void
{
    if (empty($array)) {
        return;
    }

    if ($arrayKey) {
        echo "<div class='array'><span class='key'>" . $arrayKey . " : </span> [";
    } else {
        echo "<div class='array'>array [";
    }

    foreach ($array as $key => $value) {
        if (is_array($value)) {;
            presentArray($value, $key);
        } else {
            echo '<p><span class="key">' . $key . ' : </span>' . '<span class="value">' . $value . "</span></p>";
        }
    }
    echo "]</div>";
}

function dd($value)
{
    echo '<pre><div class="dump">';
    if ('array' === gettype($value)) {
        presentArray($value);
    } elseif ('string' === gettype($value) || 'int' === gettype($value)) {
        echo $value;
    } else {
        var_dump($value);
    }
    echo '</div></pre>';
    die;
}

function verifyConnection()
{
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function parseExplodeUrl($explode)
{
    return array_map('parseUrlElement', $explode);
}

function parseUrlElement($element)
{
    $element = explode('-', $element);
    $element = array_map('ucfirst', [...$element]);
    return lcfirst(join('', $element));
}
