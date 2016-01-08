<?php
/**
 * @package        Joomla.Site
 * @subpackage     com_content
 * @copyright      Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = false;//$this->item->params->get('access-edit');
$user    = JFactory::getUser();

$sideBar = ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) ||
	(($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_parent_category'))
		or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))
		or ($params->get('show_hits'))) ||
	(isset ($this->item->toc));

?>
<div class="item-page<?php echo $this->pageclass_sfx ?>">

	<div class="row">
		<div class="col-sm-<?php echo $sideBar ? 8 : 12; ?>">
			<div class="card-panel large">
				<div class="card-content">
					<?php if ($this->params->get('show_page_heading', 1)) : ?>
						<div class="page-header">
							<h1>
								<?php echo $this->escape($this->params->get('page_heading')); ?>
							</h1>
						</div>
					<?php endif; ?>
					<?php
					if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
					{
						echo $this->item->pagination;
					}
					?>

					<?php if ($params->get('show_title')) : ?>
						<h2>
							<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
								<a href="<?php echo $this->item->readmore_link; ?>">
									<?php echo $this->escape($this->item->title); ?></a>
							<?php else : ?>
								<?php echo $this->escape($this->item->title); ?>
							<?php endif; ?>
						</h2>
					<?php endif; ?>

					<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>

					<?php if ($params->get('access-view')): ?>
						<?php if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
							<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
							<div class="img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>">
								<img
									<?php if ($images->image_fulltext_caption):
										echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
									endif; ?>
									src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" />
							</div>
						<?php endif; ?>
						<?php
						if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
							echo $this->item->pagination;
						endif;
						?>
						<?php echo $this->item->text; ?>
						<?php
						if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND !$this->item->paginationrelative):
							echo $this->item->pagination; ?>
						<?php endif; ?>

						<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '1')) OR ($params->get('urls_position') == '1'))): ?>
							<?php echo $this->loadTemplate('links'); ?>
						<?php endif; ?>
						<?php //optional teaser intro text for guests ?>
					<?php elseif ($params->get('show_noauth') == true and $user->get('guest')) : ?>
						<?php echo $this->item->introtext; ?>
						<?php //Optional link to let them register to see the whole article. ?>
						<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
							$link1 = JRoute::_('index.php?option=com_users&view=login');
							$link  = new JURI($link1); ?>
							<p class="readmore">
								<a href="<?php echo $link; ?>">
									<?php $attribs = json_decode($this->item->attribs); ?>
									<?php
									if ($attribs->alternative_readmore == null) :
										echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
									elseif ($readmore = $this->item->alternative_readmore) :
										echo $readmore;
										if ($params->get('show_readmore_title', 0) != 0) :
											echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
										endif;
									elseif ($params->get('show_readmore_title', 0) == 0) :
										echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
									else :
										echo JText::_('COM_CONTENT_READ_MORE');
										echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
									endif; ?></a>
							</p>
						<?php endif; ?>
					<?php endif; ?>
					<?php
					if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
						echo $this->item->pagination; ?>
					<?php endif; ?>

					<?php echo $this->item->event->afterDisplayContent; ?>
				</div>
			</div>
		</div>

		<?php if ($sideBar) : ?>
			<div class="col-sm-4">
				<div class="card-panel">
					<div class="card-content">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Fabrikar blog -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-4835915443010241"
							data-ad-slot="4437816627"
							data-ad-format="auto"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
				<div class="card-panel">
					<div class="card-title">Latest tweets</div>
					<div class="card-content">
						{module 105}
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<?php if (!$params->get('show_intro')) :
		echo $this->item->event->afterDisplayTitle;
	endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

</div>
