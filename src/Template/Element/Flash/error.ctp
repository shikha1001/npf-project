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
.alert {
position: relative;
padding: .75rem 1.25rem;
margin-bottom: 1rem;
border: 1px solid transparent;
border-radius: .25rem;
}
</style>