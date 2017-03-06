

<?php

if( !file_exists( "prevTime.txt" ) )
{
	file_put_contents( "prevTime.txt" , time() , LOCK_EX ) ; // Save the actual time.
}

if( !file_exists( "changeIn.txt" ) )
{
	file_put_contents( "changeIn.txt" , "5" , LOCK_EX ) ; // Save the actual time.
}

if( !file_exists( "street1.txt" ) )
{
	file_put_contents( "street1.txt" , "1" , LOCK_EX ) ; // Green.
}

if( !file_exists( "street2.txt" ) )
{
	file_put_contents( "street2.txt" , "3" , LOCK_EX ) ; // Red.
}

$street = intval( $_POST[ "street" ] ) ; 

$changeIn = intval( file_get_contents( "changeIn.txt" ) ) ;

$prevTime = intval( file_get_contents( "prevTime.txt" ) ) ;

if( time() - $prevTime >= $changeIn )
{

	file_put_contents( "prevTime.txt" , time() , LOCK_EX ) ; // Save the actual time.

	$state = intval( file_get_contents( "street1.txt" ) ) ;
   
   if( $state == 2 || $state == 1 ) // Yellow/Green. 
   {
      file_put_contents( "street1.txt" , "3" , LOCK_EX ) ; // Red.
   }
   else 
   {
      file_put_contents( "street1.txt" , "1" , LOCK_EX ) ; // Green.
   }

	$state = intval( file_get_contents( "street2.txt" ) ) ;
   
   if( $state == 2 || $state == 1 ) // Yellow/Green. 
   {
      file_put_contents( "street2.txt" , "3" , LOCK_EX ) ; // Red.
   }
   else 
   {
      file_put_contents( "street2.txt" , "1" , LOCK_EX ) ; // Green.
   }

}
elseif( time() - $prevTime >= $changeIn - 2 ) // Para amarillo.
{ 
	$state = intval( file_get_contents( "street1.txt" ) ) ;
   
   if( $state == 1 ) // Green 
   {
      file_put_contents( "street1.txt" , "2" , LOCK_EX ) ; // Yellow.
   }

	$state = intval( file_get_contents( "street2.txt" ) ) ;
   
   if( $state == 1 ) // Green 
   {
      file_put_contents( "street2.txt" , "2" , LOCK_EX ) ; // Yellow.
   }

}

if( $street == 1 )
{  
   echo file_get_contents( "street1.txt" ) ;
}
else 
{
   echo file_get_contents( "street2.txt" ) ;
}

?>