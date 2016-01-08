<?php
/**
 * Layout: List Pagination Inactive Item
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.4.2
 */

$d    = $displayData;
$item = $d->item;
$text = '';//$item->text;

switch ($item->key) :
	case 'start':
		$text = '<i class="mdi mdi-chevron-double-left"></i> ' . $text;
		break;
	case 'previous':
		$text = '<i class="mdi mdi-chevron-left"></i> ' . $text;
		break;
	case 'next':
		$text = $text . ' <i class="mdi mdi-chevron-right"></i>';
		break;
	case 'end':
		$text = $text . ' <i class="mdi mdi-chevron-double-right"></i>';
		break;
endswitch;

?>
<a title="<?php echo $item->text; ?>" href="<?php echo $item->link; ?>" class="pagenav">
	<?php echo $text; ?>
</a>
