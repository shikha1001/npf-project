<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" onclick="this.classList.add('hidden')"><?= $message ?></div>
<style type="text/css">
	.alert-success {
color: #155724;
background-color: #d4edda;
border-color: #c3e6cb;
}
.alert {
position: relative;
padding: .75rem 1.25rem;
margin-bottom: 1rem;
border: 1px solid transparent;
border-radius: .25rem;
}
</style>