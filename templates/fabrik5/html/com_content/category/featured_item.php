<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

$doc = new DOMDocument();

$doc->loadHTML($this->item->introtext);
$images = $doc->getElementsByTagName('img');
$i = 0;
$titleImage = '';

foreach ($images as $image) {
	if ($i > 0 ) {
		continue;
	}
	$titleImage = $doc->saveHTML($image);
	$image->parentNode->removeChild($image);
	$i ++;
}

$this->item->introtext = $doc->saveHTML();

?>
<div class="card panel large">
	<?php if ($titleImage !== '') :?>
		<div class="card-image">
			<?php echo $titleImage;?>
		</div>
	<?php endif;?>
	<div class="card-content">
		<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
		|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
		<div class="system-unpublished">
			<?php endif; ?>

			<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

			<?php // Todo Not that elegant would be nice to group the params ?>
			<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
				|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author')); ?>


			<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>

			<?php if (!$params->get('show_intro')) : ?>
				<?php echo $this->item->event->afterDisplayTitle; ?>
			<?php endif; ?>
			<?php echo $this->item->event->beforeDisplayContent; ?><?php echo $this->item->introtext; ?>



			<?php if ($params->get('show_readmore') && $this->item->readmore) :
				if ($params->get('access-view')) :
					$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
				else :
					$menu   = JFactory::getApplication()->getMenu();
					$active = $menu->getActive();
					$itemId = $active->id;
					$link   = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
					$link->setVar('return', base64_encode(JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language), false)));
				endif; ?>

				<?php echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

			<?php endif; ?>

			<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
			|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
		</div>
	<?php endif; ?>

		<?php echo $this->item->event->afterDisplayContent; ?>
	</div>
</div>