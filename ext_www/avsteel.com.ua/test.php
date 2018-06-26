<?php
$string = '21-11-2015';
$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replacement = 'Mounth: $2, Day: $1, Year: $3';
echo preg_replace($pat tern, $replacement, $string );