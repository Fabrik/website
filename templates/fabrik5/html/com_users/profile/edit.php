<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
//JHtml::_('formbehavior.chosen', 'select');

// Load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);

?>
<div class="card-panel profile-edit<?php echo $this->pageclass_sfx ?>">
	<div class="card-content">
		<?php if ($this->params->get('show_page_heading')) : ?>
			<div class="page-header">
				<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
			</div>
		<?php endif; ?>

		<script type="text/javascript">
			Joomla.twoFactorMethodChange = function (e) {
				var selectedPane = 'com_users_twofactor_' + jQuery('#jform_twofactor_method').val();

				jQuery.each(jQuery('#com_users_twofactor_forms_container>div'), function (i, el) {
					if (el.id != selectedPane) {
						jQuery('#' + el.id).hide(0);
					}
					else {
						jQuery('#' + el.id).show(0);
					}
				});
			}
		</script>

		<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form-validate form-horizontal well" enctype="multipart/form-data">
			<?php // Iterate through the form fieldsets and display each one. ?>
			<?php foreach ($this->form->getFieldsets() as $group => $fieldset) : ?>
				<?php $fields = $this->form->getFieldset($group); ?>
				<?php if (count($fields)) : ?>

						<?php // If the fieldset has a label set, display it as the legend. ?>
						<?php if (isset($fieldset->label)) : ?>
							<h2>
								<?php echo JText::_($fieldset->label); ?>
							</h2>
						<?php endif;
						?>
					<div class="row">
						<?php
						$items = array();
						 // Iterate through the fields in the set and display them.
						 foreach ($fields as $field) :
							 // If the field is hidden, just display the input.
							if ($field->hidden) :
								 echo $field->input;
							else :
								$str = '';

								if ($field->fieldname == 'password1') :
									$str .= '<input type="text" style="display:none">';
								endif;
								$str .= $field->input;
								$str .= $field->label;
								//$str .= '</div>';
								$items[] = $str;
							endif;

							 ?>
						<?php endforeach;
						echo implode("\n", FabrikHelperHTML::bootstrapGrid($items, array(1, 2), 'input-field'));
						?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<?php if (count($this->twofactormethods) > 1) : ?>
				<fieldset>
					<legend><?php echo JText::_('COM_USERS_PROFILE_TWO_FACTOR_AUTH'); ?></legend>

					<div class="control-group">
						<div class="control-label">
							<label id="jform_twofactor_method-lbl" for="jform_twofactor_method" class="hasTooltip"
								title="<?php echo '<strong>' . JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL') . '</strong><br />' . JText::_('COM_USERS_PROFILE_TWOFACTOR_DESC'); ?>">
								<?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL'); ?>
							</label>
						</div>
						<div class="controls">
							<?php echo JHtml::_('select.genericlist', $this->twofactormethods, 'jform[twofactor][method]', array('onchange' => 'Joomla.twoFactorMethodChange()'), 'value', 'text', $this->otpConfig->method, 'jform_twofactor_method', false); ?>
						</div>
					</div>
					<div id="com_users_twofactor_forms_container">
						<?php foreach ($this->twofactorform as $form) : ?>
							<?php $style = $form['method'] == $this->otpConfig->method ? 'display: block' : 'display: none'; ?>
							<div id="com_users_twofactor_<?php echo $form['method']; ?>" style="<?php echo $style; ?>">
								<?php echo $form['form']; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</fieldset>

				<fieldset>
					<legend>
						<?php echo JText::_('COM_USERS_PROFILE_OTEPS'); ?>
					</legend>
					<div class="alert alert-info">
						<?php echo JText::_('COM_USERS_PROFILE_OTEPS_DESC'); ?>
					</div>
					<?php if (empty($this->otpConfig->otep)) : ?>
						<div class="alert alert-warning">
							<?php echo JText::_('COM_USERS_PROFILE_OTEPS_WAIT_DESC'); ?>
						</div>
					<?php else : ?>
						<?php foreach ($this->otpConfig->otep as $otep) : ?>
							<span class="span3">
				<?php echo substr($otep, 0, 4); ?>-<?php echo substr($otep, 4, 4); ?>-<?php echo substr($otep, 8, 4); ?>-<?php echo substr($otep, 12, 4); ?>
			</span>
						<?php endforeach; ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				</fieldset>
			<?php endif; ?>

			<div class="right-align">
				<a class="btn btn-flat" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

				<button type="submit" class="btn btn-primary validate">
					<span><?php echo JText::_('JSUBMIT'); ?></span></button>
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="profile.save" />
			</div>
			<?php echo JHtml::_('form.token'); ?>
		</form>
	</div>
</div>
