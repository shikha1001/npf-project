<?php

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = $message;
}
?>
<div class="alert alert-danger"   onclick="this.classList.add('hidden');"><?php foreach($message as $msg){
	  foreach($msg as $m){ echo $m; echo "<br>";
} }?></div>
<style type="text/css">
	.alert-danger {
color: #721c24;
background-color: #f8d7da;
border-color: #f5c6cb;
}
</style>