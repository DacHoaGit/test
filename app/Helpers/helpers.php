<?php

if (!function_exists('calculateTotalHours')) {
    function calculateTotalHours($startTimestamp, $endTimestamp)
    {
        $startTime = \Carbon\Carbon::createFromTimestamp($startTimestamp);
        $endTime = \Carbon\Carbon::createFromTimestamp($endTimestamp);

        $totalHours = $startTime->diffInSeconds($endTime)/60;

        return $totalHours;
    }
}
