<?php
/**
 * Layout: List Pagination Footer
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.3.3
 */

$d = $displayData;
$list = $d->list;
$startClass = $list['start']['active'] !== 1 ? ' ' : ' active';
$prevClass = $list['previous']['active'] !== 1 ? ' ' : ' active';
$nextClass = $list['next']['active'] !== 1 ? ' ' : ' active';
$endClass = $list['end']['active'] !== 1 ? ' ' : ' active';

?>
<div class="pagination center-align">
	<ul class="pagination-list">
		<li class="pagination-start">
			<?php echo $list['start']['data']; ?>
		</li>
		<li class="pagination-prev">
			<?php echo $list['previous']['data']; ?>
		</li>


		<li class="pagination-next">
			<?php echo $list['next']['data'];?>
		</li>
		<li class="pagination-end">
			<?php echo $list['end']['data'];?>
		</li>
	</ul>
</div>