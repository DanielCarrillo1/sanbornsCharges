<?php

if (!function_exists('fixKeys')) {
    function fixKeys($array)
    {
        foreach ($array as $k => $val) {
            if (is_array($val))
                $array[$k] = fixKeys($val); //recursive
        }
        return array_values($array);
    }
}

function SanbornsTxtToArray($texto)
{
    $dataToArray = Arr::sort(preg_split("/\n/", $texto));
    $dataFilter = preg_grep("/([[:digit:]]{35})/", $dataToArray);
    $orderData = fixKeys($dataFilter);
    return $orderData;
}
