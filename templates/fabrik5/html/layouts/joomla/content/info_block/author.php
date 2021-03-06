<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$author = ($displayData['item']->created_by_alias ? $displayData['item']->created_by_alias : $displayData['item']->author);
?>

<div itemprop="author" itemscope itemtype="http://schema.org/Person">
	<img src="images/avatars/<?php echo $author; ?>.jpg" alt="" class="circle">
	<?php $author = '<span itemprop="name">' . $author . '</span>'; ?>
	<?php if (!empty($displayData['item']->contact_link) && $displayData['params']->get('link_author') == true) : ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $displayData['item']->contact_link, $author, array('itemprop' => 'url'))); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
	<?php endif; ?>
	<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
</div>

