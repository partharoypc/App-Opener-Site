<?php

    $counterFile = 'view.txt' ;

    // jQuery ajax request is sent here
    if ( isset($_GET['increase']) )
    {
        if ( ( $counter = @file_get_contents($counterFile) ) === false ) die('Error : file counter does not exist') ;
        file_put_contents($counterFile,++$counter) ;
        echo $counter ;
        return false ;
    }

    if ( ! $counter = @file_get_contents($counterFile) )
    {
        if ( ! $myfile = fopen($counterFile,'w') )
            die('Unable to create counter file !!') ;
        chmod($counterFile,0644);
        file_put_contents($counterFile,0) ;
    }

?>