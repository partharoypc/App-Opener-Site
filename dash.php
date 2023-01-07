<?php
$counterFile = 'view.txt' ;

// jQuery ajax request is sent here
if ( isset($_GET['api']) )
{
    if ( ( $counter = @file_get_contents($counterFile) ) === false ) die('Error : file counter does not exist') ;
    echo "Site Views: ".$counter ;

}