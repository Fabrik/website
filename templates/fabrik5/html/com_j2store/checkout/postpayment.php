<?php
/*------------------------------------------------------------------------
# com_j2store - J2Store
# ------------------------------------------------------------------------
# author    Ramesh Elamathi - Weblogicx India http://www.weblogicxindia.com
# copyright Copyright (C) 2014 - 19 Weblogicxindia.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://j2store.org
# Technical Support:  Forum - http://j2store.org/forum/index.html
-------------------------------------------------------------------------*/

// no direct access
	defined('_JEXEC') or die('Restricted access');
	$order_link = @$this->order_link;
	$plugin_html = @$this->plugin_html;
	$app = JFactory::getApplication();
	$paction = $app->input->getString('paction');
?>
<div class="row">
<div class="col-xs-12">
<?php echo J2Store::modules()->loadposition('j2store-postpayment-top'); ?>
<h3><?php echo JText::_( "J2STORE_CHECKOUT_RESULTS" ); ?></h3>

<?php echo $plugin_html; ?>

<?php if(!empty($order_link) && $paction != 'cancel'):?>
<div class="note">
	<a href="<?php echo JRoute::_($order_link); ?>">
        <?php echo JText::_( "J2STORE_VIEW_ORDER_HISTORY" ); ?>
	</a>
</div>
<?php endif; ?>
<?php echo J2Store::modules()->loadposition('j2store-postpayment-bottom'); ?>
</div>
</div>