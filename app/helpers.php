<?php

use App\totalCharge;
use App\totalReturn;
use Illuminate\Support\Facades\DB;

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

function numberChargesReturns()
{
    TotalReturn::truncate();
    TotalCharge::truncate();

    DB::select('INSERT INTO total_returns (sanborns_id, total, import) 
                    SELECT sanborns_id, COUNT(*), sum(import) FROM charges_returns
                    where answer is null group by sanborns_id');

    DB::select('INSERT INTO total_charges (sanborns_id, total, import)
                    SELECT sanborns_id, COUNT(*), sum(import) FROM charges_returns 
                    where answer = "00" group by sanborns_id');
}
