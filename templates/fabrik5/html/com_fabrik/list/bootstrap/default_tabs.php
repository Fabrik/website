<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

if (!empty($this->tabs)) :
?>
<div>
	<?php
	echo FabrikHelperHTML::getLayout('fabrik-tabs')->render((object) array('tabs' => $this->tabs));
	?>
</div>
<?php
endif; ?>
