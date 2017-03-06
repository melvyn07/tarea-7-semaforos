

<?php  

file_put_contents( "changeIn.txt" , $_POST[ "value" ] , LOCK_EX ) ; 

echo true ;

?>