<?php

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = ($message);
}
?>
<div class="alert alert-danger"  style="color:red;" onclick="this.classList.add('hidden');"><?php foreach($message as $msg){
	  foreach($msg as $m){ echo $m;
} }?></div>