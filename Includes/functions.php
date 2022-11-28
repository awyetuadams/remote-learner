<?php

function __autoload($cname){
      include 'DB/'.$cname.'.php';  
}

?>
