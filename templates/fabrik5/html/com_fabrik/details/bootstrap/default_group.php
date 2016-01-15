<?php
/**
 * Bootstrap Details Template
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<ul class="collection">

	<?php
	$rowStarted = false;
	foreach ($this->elements as $element) :
		$this->element = $element;
		$style  = $element->hidden ? 'style="display:none"' : '';
		?>
		<li class="collection-item" <?php echo $style; ?>>
			<span class="title"><?php echo $element->label_raw; ?></span>
			<?php echo $element->element; ?>
		</li>
		<?php

	endforeach;
	?>
</ul>