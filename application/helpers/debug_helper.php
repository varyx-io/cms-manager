<?php
function pre($content)
{
	echo "<pre>" . $content . "</pre>";
}

function debug_output($content)
{
	pre(print_r($content,true));
}