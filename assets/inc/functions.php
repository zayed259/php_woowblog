<?php
// human time ago function
function HumanTime($date)
{
    $date2 = date("Y-m-d H:i:s");
    $diff = abs(strtotime($date2) - strtotime($date));
    $days = floor($diff / (60 * 60 * 24));
    $hours = floor(($diff - $days * 60 * 60 * 24) / (60 * 60));
    $mins = floor(($diff - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
    $secs = floor(($diff - $days * 60 * 60 * 24 - $hours * 60 * 60 - $mins * 60));
    if ($days < 7) {
        if ($days = 0 && $hours == 0 && $mins == 0) {
            $difference = $secs . ' seconds ago';
        } elseif ($days == 0 && $hours == 0) {
            $difference = $mins . ' minutes ago';
        } elseif ($days == 0) {
            $difference = $hours . ' hours ago';
        } else {
            $difference = $days . ' days ago';
        }
    } else {
        $difference = date('F n', strtotime($date)) . ' at ' . date('g:i A', strtotime($date));
    }
    return $difference;
}
