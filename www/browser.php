<?php
$ver = 58.0;


if ($browser = get_browser(null, false)){

   /* if (floatval($browser->version)-floatval($ver) < 0){
        echo 'Старый браузер<br>';
    } else {
        echo '<pre>';
        print_r($browser);
        echo '</pre>';
    }*/
    echo '<pre>';
    print_r($browser);
    echo '</pre>';

} else{
    echo 'PHP library browscap.ini is not install';
}




