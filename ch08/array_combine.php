<?php
$colors = ['red', 'amber', 'green'];
$actions = ['stop', 'caution', 'go'];
$signals = array_combine($colors, $actions);
// ['red' => 'stop', 'amber' => 'caution', 'green' => 'go]
echo '<pre>';
print_r($signals);
echo '</pre>';