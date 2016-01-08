<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;
?>

<?php if($this->params->get('item_show_product_manufacturer_name', 1) && !empty($this->product->manufacturer)): ?>
	<span class="manufacturer-brand">
		<?php echo JText::_('J2STORE_PRODUCT_MANUFACTURER_NAME'); ?> : <?php echo $this->product->manufacturer; ?>
	</span>

<?php endif; ?>