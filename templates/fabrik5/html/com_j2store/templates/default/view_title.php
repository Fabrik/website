<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 * 
 * Bootstrap 2 layout of product detail
 */
// No direct access
defined('_JEXEC') or die;
?>

<?php if($this->params->get('item_show_title', 1)): ?>
	<h2 itemprop="name" class="product-title">
		<?php echo $this->product->product_name; ?>
	</h2>
<?php endif; ?>

