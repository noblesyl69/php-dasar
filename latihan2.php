<?php 

    // fungsi php

    // date
    // l = hari
    //  j = tanggal
    // F = bulan string
    // Y = tahun

    echo date("l, j F,Y"). PHP_EOL;
    echo date("l, d M,Y"). PHP_EOL;

    // time
    echo time(). PHP_EOL;

    // saat ini di tambahkan 100 hari kedepan
    echo date("l ,d F, Y", time()+60*60*24*100).PHP_EOL;
    // saat ini di tambahkan 100 hari kebelakang
    echo date("l ,d F, Y", time()-60*60*24*100).PHP_EOL;


    // mktime = membuat detik sendiri
    // mktime(0,0,0,0,0,0)
    // jam, menit,detik,bulan,tanggal,tahun
    echo mktime(0,0,0,0,0,0).PHP_EOL;
    
    echo date("l, d F, Y", mktime(0,0,0,7,1,1992)).PHP_EOL;
    echo date("l, d F, Y",mktime(0,0,0,10,21,1997)).PHP_EOL;


    echo date( "l, d F, Y",strtotime("21 october 1997"));


?>