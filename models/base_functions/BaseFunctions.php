<?php

function presentArray(array $array, string $arrayKey = null): void
{
    if (empty($array)) {
        return;
    }

    if ($arrayKey) {
        echo "<div style='
            margin-left: 25px;
        '><span style='
            color: #ff9900;
        '>" . $arrayKey . " : </span> [";
    } else {
        echo "<div>array [";
    }

    foreach ($array as $key => $value) {
        if (is_array($value)) {;
            presentArray($value, $key);
        } else {
            echo '<p style="
                margin: 0 0 0 25px;
                padding: 0;
            "><span style="
                color: #ff9900;
            ">' . $key . ' : </span>' . '<span style="
                color: #00ff00;
            ">' . $value . "</span></p>";
        }
    }
    echo "]</div>";
}

function dd($value)
{
    echo '<pre style="
        background-color: #111;
        padding: 25px;
        color: #9900ff;
    ">';
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

function verifyAuthentification()
{
    if (!isset($_SESSION['user'])) {
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
