<?php
/**
 * Layout: list edit button
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.3.3
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
$d = $displayData;

?>
<a data-loadmethod="<?php echo $d->loadMethod;?>" class="fabrik_view fabrik__rowlink" <?php echo $d->detailsAttributes; ?>
	data-list="<?php echo $d->dataList; ?>" href="<?php echo $d->link; ?>" title="<?php echo $d->viewLabel;?>" target="<?php echo $d->viewLinkTarget; ?>">
<?php echo FabrikHelperHTML::image('search.png', 'list', '', array('alt' => $d->viewLabel));?></a>