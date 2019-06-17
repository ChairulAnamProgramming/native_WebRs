<?php

function base_url($url = null)
{
    $base_url = "http://localhost/native/rumah_sakit";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

function tgl($tgl)
{
    $year = substr($tgl, 0, 4);
    $mount = substr($tgl, 5, 2);
    $day = substr($tgl, 8, 2);

    return $day . "-" . $mount . "-" . $year;
}
