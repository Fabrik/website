<?php
/**
 * Bootstrap Details Template
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       3.1
 */

$form  = $this->form;
$model = $this->getModel();
$d     = $this->data;
?>
<div class="card-panel">
	<div class="card-content">
		<?php
		if ($this->params->get('show_page_heading', 1)) : ?>
			<div class="componentheading<?php echo $this->params->get('pageclass_sfx') ?>">
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			</div>
			<?php
		endif;

		if ($this->params->get('show-title', 1)) :?>
			<div class="page-header">
				<h1><?php echo $form->label; ?></h1>
			</div>
			<?php
		endif;

		echo $form->intro;
		echo '<div class="fabrikForm fabrikDetails" id="' . $form->formid . '">';
		echo $this->plugintop;
		?>
		<h2><?php echo $d['fab_tutorials___category']; ?></h2>
		<?php echo $d['fab_tutorials___tut_desc'];
		echo $this->groups['Flash Tutorial']->elements['tut_flash']->element;
		echo $this->pluginbottom;
		echo '</div>';
		echo $form->outro;
		echo $this->pluginend;
		?>
	</div>
</div>

