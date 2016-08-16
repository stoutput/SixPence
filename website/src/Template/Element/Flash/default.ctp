<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="container">
  <div class="alert alert-info" role="alert"><?= h($message) ?></div>
</div>
