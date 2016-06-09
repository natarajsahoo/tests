<?php
echo "started_parent\n";
exec("php 2.php > /dev/null 2>&1 &");
echo "finished_parent\n";
