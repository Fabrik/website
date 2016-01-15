<?php
/**
 * Default list element render
 * Override this file in plugins/fabrik_element/{plugin}/layouts/fabrik-element-{plugin}-list.php
 */

defined('JPATH_BASE') or die;

$d = $displayData;
$props = isset($d->properties) ? $d->properties : '';

$d->icon = str_replace('icon-', 'mdi-', $d->icon);
//echo '|' . $d->icon . '|';

switch (trim($d->icon)) {
	case 'mdi-edit':
		$d->icon = 'mdi-pencil';
		break;
	case 'mdi-search':
		$d->icon = 'mdi-magnify';
		break;
}
?>

<i data-isicon="true" class="mdi <?php echo $d->icon;?>" <?php echo $props;?>></i>