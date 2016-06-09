<?php
date_default_timezone_set("Asia/Kolkata");
sleep(10);

$file = 'test.txt';
$current = strftime("%d/%m/%Y-%H:%M:%S", time())."\n";
file_put_contents($file, $current);
