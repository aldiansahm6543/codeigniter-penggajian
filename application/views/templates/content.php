<?php view('templates/header'); ?>
<?php view('templates/sidebar'); ?>
<?php view('templates/navbar'); ?>
<?php view($page, isset($content) ? $content : ''); ?>
<?php view('templates/footer'); ?>