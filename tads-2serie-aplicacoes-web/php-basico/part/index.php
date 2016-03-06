<ul><?php

$files = glob('*');

foreach($files as $file) {
	?><li><a href="<?php echo $file; ?>"><?php echo $file; ?></a></li><?php
}
?>
</ul>