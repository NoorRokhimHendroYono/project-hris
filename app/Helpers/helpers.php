<?php

use Carbon\Carbon;

function tanggal_indonesia($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d F Y');
}