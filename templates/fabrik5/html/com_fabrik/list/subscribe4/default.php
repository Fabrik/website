<!-- Google Website Optimizer Control Script -->
<script>
	function utmx_section() {
	}
	function utmx() {
	}
	(function () {
		var k = '1432616727', d = document, l = d.location, c = d.cookie;

		function f(n) {
			if (c) {
				var i = c.indexOf(n + '=');
				if (i > -1) {
					var j = c.indexOf(';', i);
					return escape(c.substring(i + n.
							length + 1, j < 0 ? c.length : j))
				}
			}
		}

		var x = f('__utmx'), xx = f('__utmxx'), h = l.hash;
		d.write('<sc' + 'ript src="' +
			'http' + (l.protocol == 'https:' ? 's://ssl' : '://www') + '.google-analytics.com'
			+ '/siteopt.js?v=1&utmxkey=' + k + '&utmx=' + (x ? x : '') + '&utmxx=' + (xx ? xx : '') + '&utmxtime='
			+ new Date().valueOf() + (h ? '&utmxhash=' + escape(h.substr(1)) : '') +
			'" type="text/javascript" charset="utf-8"></sc' + 'ript>')
	})();
</script>
<!-- End of Google Website Optimizer Control Script -->
<!-- Google Website Optimizer Tracking Script -->
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['gwo._setAccount', 'UA-21750094-1']);
	_gaq.push(['gwo._trackPageview', '/1432616727/test']);
	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
</script>
<!-- End of Google Website Optimizer Tracking Script -->

<script>utmx_section("Layout")</script>
{j2store}11|cart{/j2store}
<form class="fabrikForm" action="<?php echo $this->table->action; ?>"
	method="post" id="<?php echo $this->formid; ?>" name="fabrikTable">
	<div class="page-header">
		<h1>Support</h1></div>
	<p>If you need support from the Fabrik team, you&apos;re
		in the right place. Although Fabrik is (and always will be) free, we
		offer a range of monthly and annual subscriptions where you can get the
		help you need with your projects.</p>

	<!-- <div class="alert alert-info">Subscriptions are momentarily not available whist we re-import some user data please check back again soon</div> -->

	<?php $plans = $this->rows[0]; ?>
	<?php $db = JFactory::getDBO();
	$db->setQuery("select * from jos_fabrik_subs_plan_billing_cycle");
	$prices    = $db->loadObjectList();
	$discounts = array(); ?>
	<div id="subscription-container">
		<div class="subs">
			<table border="0" cellspacing="0" cellpadding="4" width="100%">
				<tbody>
				<tr class="headings">
					<td class="service" width="20%" valign="top"></td>
					<?php foreach ($plans as $plan)
					{ ?>
						<td valign="top"<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<h2><?php echo $plan->data->jos_fabrik_subs_plans___plan_name ?></h2>
							<?php $found = false;
							foreach ($prices as $price)
							{
								if ($price->period_unit == 'M' && $price->plan_id == $plan->data->jos_fabrik_subs_plans___id)
								{
									echo "<h3>&euro;" . $price->cost . " / month</h3>";
									$found = true;
								}
							}
							$annualDiscount = '';
							foreach ($prices as $price)
							{
								if ($price->period_unit == 'Y' && $price->plan_id == $plan->data->jos_fabrik_subs_plans___id)
								{
									if (!$found)
									{
										echo "<h3>&euro;" . $price->cost . " / year</h3>";
									}
									else
									{
										$discounts[$plan->data->jos_fabrik_subs_plans___id] = "&euro;" . number_format(floatval($price->cost / 12), 2) . " / month";
									}
								}
							}
							?>
							<?php if (isset($plan->data->jos_fabrik_subs_plans___strapline) && $plan->data->jos_fabrik_subs_plans___strapline !== '')
							{ ?>
								<span class="strapline"><?php echo $plan->data->jos_fabrik_subs_plans___strapline; ?></span>
							<?php } ?>
						</td>
					<?php } ?>
				</tr>
				<tr class="annualdiscount">
					<td class="service">Annual discount</td>
					<?php foreach ($plans as $plan)
					{ ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<?php echo JArrayHelper::getValue($discounts, $plan->data->jos_fabrik_subs_plans___id) ?>
						</td>
					<?php } ?>
				</tr>
				<tr>
					<td class="service">Exclusive Downloads</td>
					<?php foreach ($plans as $plan)
					{
						$i = $plan->data->jos_fabrik_subs_plans___exclusive_plugins_raw == '1' ? 'icon-ok' : 'icon-remove'; ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<i class="<?php echo $i ?>"></i>
						</td>
					<?php } ?>
				</tr>
				<tr>

				<tr>
					<td class="service">User Manual Wiki</td>
					<?php foreach ($plans as $plan)
					{
						$i = $plan->data->jos_fabrik_subs_plans___wiki_user_manual_raw == '1' ? 'icon-ok' : 'icon-remove'; ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<i class="<?php echo $i ?>"></i>
						</td>
					<?php } ?>
				</tr>
				<tr>

				<tr>
					<td class="service">Video Tutorials</td>
					<?php foreach ($plans as $plan)
					{
						switch ($plan->data->jos_fabrik_subs_plans___video_tutorials_raw)
						{
							case '0':
							default:
								$i = 'icon-remove';
								break;
							case '1':
							case '2':
								$i = 'icon-ok';
								break;
						}
						?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<i class="<?php echo $i ?>"></i>
						</td>
					<?php } ?>
				</tr>

				<tr>
					<td class="service">Dedicated Support Forum</td>
					<?php foreach ($plans as $plan)
					{
						$i = $plan->data->jos_fabrik_subs_plans___dedicated_forum_raw == '1' ? 'icon-ok' : 'icon-remove'; ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<i class="<?php echo $i ?>"></i>
						</td>
					<?php } ?>
				</tr>

				<tr>
					<td class="service">Forum Response Time</td>
					<?php foreach ($plans as $plan)
					{
						$img = $plan->data->jos_fabrik_subs_plans___response_time == '' ? '<img src="media/com_fabrik/images/delete.png" alt="no" />' : $plan->data->jos_fabrik_subs_plans___response_time . '*';
						$i   = $plan->data->jos_fabrik_subs_plans___response_time == '' ? '<i class="icon-remove"></i>' : '<i class="icon-time"></i> ' . $plan->data->jos_fabrik_subs_plans___response_time . '*'; ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<?php echo $i ?>
						</td>
					<?php } ?>
				</tr>

				<tr>
					<td class="service">Rapid Support via Live Chat</td>
					<?php foreach ($plans as $plan)
					{
						$img = $plan->data->jos_fabrik_subs_plans___im_support_raw == '1' ? 'action_check.png' : 'delete.png';
						$i   = $plan->data->jos_fabrik_subs_plans___im_support_raw == '1' ? 'icon-ok' : 'icon-remove'; ?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<i class="<?php echo $i ?>"></i>
						</td>
					<?php } ?>
				</tr>

				<tr class="signup">
					<td class="service"></td>
					<?php
					foreach ($plans as $plan) :
						$url      = JRoute::_('index.php?option=com_fabrik&view=form&formid=22&rowid=-1') . '?usekey=userid&jos_fabrik_subs_users___plan_id_raw=' . $plan->data->jos_fabrik_subs_plans___id_raw;
						$btnClass = $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? 'btn btn-primary' : 'btn';
						?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
							<a class="<?php echo $btnClass ?>" href="<?php echo $url ?>"><i class="icon-ok-sign"></i> Sign up</a>
						</td>
						<?php
					endforeach;
					?>
				</tr>

				</tbody>
				<thead>
				<tr>
					<td></td>
					<?php foreach ($plans as $plan)
					{
						?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
						</td>
					<?php } ?>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<td></td>
					<?php foreach ($plans as $plan)
					{
						?>
						<td<?php echo $plan->data->jos_fabrik_subs_plans___id_raw == 8 ? ' class="bestvalue"' : '' ?>>
						</td>
						<?php
					}
					?>
				</tr>
				</tfoot>
			</table>

		</div>
	</div>
</form>
<p style="text-align: center;">Looking for a free account?
	<a href="http://fabrikar.com/component/users/?view=registration">Register here</a>.</p>

<div class="notes">
	* Excluding weekends
</div>


</noscript>