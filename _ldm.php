<!-- ========================================== 
LDM: Test page for web hosts.  

  * Display Server Name & IP address for migration verification.
  * Optionally, display extended debug info.

  USAGE: Deploy this page in a public http directory, load it via browser.
========================================== -->

<html>
<head></head>
<body>

<br>
<!--<img src="/favicon.ico">-->
<img src="/favicon.ico">
<h1>Looking for <a href="http://<?php echo $_SERVER[ 'HTTP_HOST' ]; ?>"><?php echo $_SERVER[ 'HTTP_HOST' ]; ?></a> ?</h1>
Visit the home page <a href="http://<?php echo $_SERVER[ 'HTTP_HOST' ]; ?>">here</a>.
<br><br><br>
<hr>

<p style="font-size:small">
  <i>&copy;<?php echo date("Y"); ?></i> | 
  Site design by <a href="http://lentinidesign.com">Lentini Design &amp; Marketing</a> |
  <a href="http://lentinidesign.com">lentinidesign.com</a>
</p>

<!-- Debug Info Starts -->
<pre style="color:silver">

<?php 
  //--------------------------------------------------
  function  e( $str )         { echo $str . "\n"; }
  function  f( $name, $value ){ return "$name:\t$value"; }
  function ef( $name, $value ){ e(f( $name, $value)); }
  function e_SERVER( $name )  { ef ( $name, $_SERVER[$name] ); }
  //--------------------------------------------------

  //
  //Display host name, IP, and date
  //

  ef( "Info", date("Y-m-d h:i:s a") );
  e("--------------------------");
  e_SERVER( 'HTTP_HOST' ); 
  e_SERVER( 'SERVER_NAME' );
  e_SERVER( 'SERVER_ADDR'  );
  e_SERVER( 'SERVER_PORT' ); 
  e_SERVER( 'SCRIPT_URI' );
  e_SERVER( 'SCRIPT_FILENAME' );
  ef("Server/System", php_uname());
  e("--------------------------");
  
  
  /** For Extended DNS Info - Leave Commented on Live Sites! */
  // $result = dns_get_record($_SERVER['HTTP_HOST'], DNS_ALL, $authns, $addtl);echo "DNS = ";  print_r($result);  echo "Auth NS = ";  print_r($authns);  echo "Additional = ";  print_r($addtl);
  
  
  /** For Extended Debugging - Leave Commented on Live Sites! */
  // while (list($var,$value) = each ($_SERVER)) { ef( $var, $value ); }while (list($var,$value) = each ($_REQUEST)) { ef( $var, $value ); }

 
  /** For Extended Debugging - Leave Commented on Live Sites! */
  // e(phpinfo());

?>
</pre>
</body>
</html>