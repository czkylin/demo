<?php

$str = $this->fetch($template_html);
$str = trim($str,"∮");
$str = explode("∮",$str);
$str=json_encode($str);

echo $str;
