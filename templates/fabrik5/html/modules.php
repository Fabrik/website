<?php
/**
 * @package        Joomla.Site
 * @copyright      Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
use \Joomla\Utilities\ArrayHelper;

/*
 * xhtml (divs and font headder tags)
 */
function modChrome_bootstrap($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
			<?php if ($module->showtitle != 0) : ?>
				<h3 class="page-header"><?php echo $module->title; ?></h3>
			<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}

function modChrome_material_card($module, &$params, &$attribs)
{
	if (!empty ($module->content)) :
		$doc = new DOMDocument();
		$doc->loadHTML($module->content);
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
		$module->content = $doc->saveHTML();

		?>
		<div class="col-grow-vertical <?php echo htmlspecialchars($params->get('moduleclass_sfx')) . ' ' . ArrayHelper::getValue($attribs, 'col'); ?>">
			<div class="card">
				<?php if ($titleImage !== '') :?>
					<div class="card-image">
						<?php echo $titleImage;?>
					</div>
				<?php endif;?>
				<div class="card-content">
					<?php if ($module->showtitle != 0) : ?>
						<span class="card-title"><?php echo $module->title; ?></span>
					<?php endif; ?>
					<?php echo $module->content; ?>
				</div>
			</div>
		</div>
		<?php
	endif;
}
