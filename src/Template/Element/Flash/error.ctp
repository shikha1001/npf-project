<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>
<style type="text/css">
	.alert-danger {
color: #721c24;
background-color: #f8d7da;
border-color: #f5c6cb;
}
</style>