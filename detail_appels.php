<?php
require_once('bootstrap.php');
function CalcTime($times, $humain = false)
{

    $all_seconds = 0;
    foreach ($times as $time) {
        $time = explode(':', $time);
        if (count($time) === 3) {
            $hour = $time[0];
            $minute = $time[1];
            $second = $time[2];
            $all_seconds += $hour * 3600;
            $all_seconds += $minute * 60;
            $all_seconds += $second;
        }
    }
    if ($humain) {
        $s = $all_seconds % 60;
        $m = floor(($all_seconds % 3600) / 60);
        $h = floor(($all_seconds % 86400) / 3600);
        $d = floor(($all_seconds % 2592000) / 86400);
        $M = floor($all_seconds / 2592000);
        return "$M mois, $d jours, $h heures, $m minutes, $s secondes";
    }
    $total_minutes = floor($all_seconds / 60);
    $seconds = $all_seconds % 60;
    $hours = floor($total_minutes / 60);
    $minutes = $total_minutes % 60;
    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

// Get Total Call duration
$db->where("DATE(date) >= '2012-02-15'");
$db->where("type", '%appel%', 'like');
$call_durations = $db->get("detail_appels", NULL, 'duree_vlm_reel');
$call_durations = array_map(function ($date) {
    return $date['duree_vlm_reel'];
}, $call_durations);


// Get TOP 10
$db->where("TYPE",'%connexion%','like');
$db->where("heure between '08:00:00' AND '18:00:00'");
$db->groupBy("n_abonne");
$db->orderBy('TOTAL_VOLUME_FACTURE');
$top10_abonne = $db->get('detail_appels',10,['n_abonne', 'sum(CAST(duree_vlm_fac as UNSIGNED)) AS TOTAL_VOLUME_FACTURE']);



$db->where("TYPE",'%sms%','like');
$sms_total = $db->get('detail_appels',1,['count(*) AS TOTAL_SMS'])[0];
?>