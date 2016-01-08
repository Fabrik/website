<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 *
 * Bootstrap 2 layout of products
 */
// No direct access
defined('_JEXEC') or die;
JFactory::getDocument()->addScript(JURI::root(true).'/media/j2store/js/filter.js');
$currency = J2Store::currency()->getSymbol();
$catid = JFactory::getApplication()->input->get('catid',array(),'Array');

$session = JFactory::getSession();
$session_manufacturer_ids = $session->get('manufacturer_ids',array(), 'j2store');
$session_vendor_ids = $session->get('vendor_ids',array(), 'j2store');
$session_productfilter_ids = $session->get('productfilter_ids',array(), 'j2store');

$currency = $this->currency->getSymbol();
$catid = JFactory::getApplication()->input->get('catid',array(),'Array');?>
<?php
		$default_catid ='';
		if(!empty($this->filters['filter_categories']) && count($this->filters['filter_categories'])):?>
		<?php $default_catid = $this->filters['filter_categories'][0]->id;?>
	<?php endif;?>
<?php
$filter_catid = isset($this->filter_catid) ? $this->filter_catid : '';
?>

<div id="j2store-product-loading" style="display:none;"></div>

<form
	action="<?php echo JRoute::_('index.php');?>"
	method="post"
	class="form-horizontal"
	id="productsideFilters"
	name="productsideFilters"
	enctype="multipart/form-data">
	<input type="hidden" name="filter_catid" id="filter_catid"  value ="<?php echo $filter_catid;?>" />
	<!-- Price Filters Starts Here -->
	<?php if($this->params->get('list_show_filter_price', 0) && isset($this->filters['pricefilters']) && count($this->filters['pricefilters'])): ?>
		<?php
		$min_price = $this->filters['pricefilters']['min_price'];
		$max_price = $this->filters['pricefilters']['max_price'];
		$range = $this->filters['pricefilters']['range'];
		$pricefrom = isset($this->state->pricefrom) && $this->state->pricefrom ? $this->state->pricefrom : $min_price;
		$priceto = isset($this->state->priceto) && $this->state->priceto ? $this->state->priceto : $max_price;

		?>
		<div id="j2store-price-filter-container" class="j2store-product-filters price-filters"  >
			<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_PRICE_TITTLE'); ?></h4>
				<div  id="j2store-slider-range" style="width:100%;" ></div>
			<br/>
			<!-- Price Filters Ends Here -->
			<div id="j2store-slider-range-box" class="price-input-box" >
				<input class="btn btn-success" type="submit"   id="filterProductsBtn"  value="<?php echo JText::_('J2STORE_FILTER_GO');?>" />
					<div class="pull-right">
						<?php echo $currency;?><span id="min_price"><?php echo $pricefrom;?></span>
						<?php echo JText::_('J2STORE_TO');?>
						<?php echo $currency;?><span id="max_price"><?php echo $priceto;?></span>
						<?php echo J2Html::hidden('pricefrom',$pricefrom ,array('id'=>'min_price_input'));?>
						<?php echo J2Html::hidden('priceto',$priceto,array('id'=>'max_price_input'));?>
					</div>
			</div>
		</div>
	<?php endif;?>



	<?php if($this->params->get('list_show_filter_category', 0)):?>
		<!-- Module Categories Filters -->
	<?php if(!empty($this->filters['filter_categories']) && count($this->filters['filter_categories'])):?>


	<div class="j2store-product-filters category-filters"  >
		<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_CATEGORY_TITTLE'); ?></h4>
		<?php
		if($this->params->get('list_filter_category_toggle',1) && $this->params->get('list_filter_category_toggle',1)==1 ||  !empty($filter_catid)   ):?>
			<a href="javascript:void(0);" id="cat-filter-icon-minus"   onclick="getCategoryFilterToggle(this);"><i class="icon-minus"></i></a>
			<a href="javascript:void(0);" id="cat-filter-icon-plus" onclick="getCategoryFilterToggle(this);" style="display:none;" ><i class="icon-plus"></i></a>
			<div id="j2store_category"  style="display:block;">
		<?php elseif($this->params->get('list_filter_category_toggle',1)==2 && $this->params->get('list_filter_category_toggle',1)):?>
			<a href="javascript:void(0);" id="cat-filter-icon-minus"  onclick="getCategoryFilterToggle(this);" ><i class="icon-plus"></i></a>
			<a href="javascript:void(0);" id="cat-filter-icon-plus"   onclick="getCategoryFilterToggle(this);" style="display:none;" ><i class="icon-minus"></i></a>
			<div id="j2store_category" style="display:none;" >
		<?php else:?>
			<div id="j2store_category" >
		<?php endif;?>
			<ul id="j2store_categories_mod" class="nav nav-list nav-stacked j2store-category-list">
				<?php if($this->params->get('list_show_filter_category_all',0)):?>
					<li class="<?php echo  isset($filter_catid) && $filter_catid =='' ? 'active' : '' ; ?> j2product-categories  level1">
						<a href="javascript:void(0);" class="j2store-item-rootcategory" data-key="filter_catid" data-value=""
									onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('filter_catid').value='';document.getElementById('sort_filter_catid').value=''; document.getElementById('productsideFilters').submit();">
								<?php echo JText::_('J2STORE_ALL'); ?>
						</a>
					</li>
				<?php endif;?>
				<?php foreach ($this->filters['filter_categories'] as $item) : ?>
					<li class="<?php echo (!empty($filter_catid) && $filter_catid== $item->id) ? 'active' : '' ; ?> j2product-categories  level<?php echo $item->level?>">
						<?php if($item->level >1):?>
							<a href="javascript:void(0);"  class="j2store-item-category" data-key="filter_catid" data-value="<?php echo $item->id?>"
									>
									<?php echo str_repeat("-", $item->level);?><?php echo $item->title; ?>
							</a>
													<?php else:?>
							<a href="javascript:void(0);"  class="j2store-item-category" data-key="filter_catid" data-value="<?php echo $item->id?>"
								>
								<?php echo $item->title; ?>
							</a>
						<?php endif;?>
					</li>
				<?php endforeach; ?>
			</ul>

	</div>
</div>
<?php endif;?>
<?php endif;?>

	<!-- Manufacturer -->

	<?php if($this->params->get('list_show_manfacturer_filter', 0)):?>
	<?php if(count($this->filters['manufacturers'])): ?>
		<!-- Brand / Manufacturer Filters -->
		<div class="j2store-product-filters manufacturer-filters">

		<div class="j2store-product-filter-title j2store-product-brand-title">
			<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_BY_BRAND');?></h4>
			<span>
				<?php if(!empty($session_manufacturer_ids)):?>
					<a href="javascript:void(0);"  onclick="resetJ2storeBrandFilter();" >
						<?php echo JText::_('J2STORE_CLEAR');?>
					</a>
				<?php endif; ?>
			</span>
		</div>
			<div id="j2store-brand-filter-container" class="control-group"  >
				<?php
						$url = 'index.php?option=com_j2store&view=products';
					foreach($this->filters['manufacturers'] as $k => $brand):
						$checked ='';
						if(!empty($session_manufacturer_ids) &&  in_array($brand->j2store_manufacturer_id , $session_manufacturer_ids) ){
							$checked ="checked ='checked'";
						}
					?>
					<label class="j2store-product-brand-label">
						<input type="checkbox" class="j2store-brand-checkboxes" name="manufacturer_ids[]"
								id="brand-input-<?php echo $brand->j2store_manufacturer_id ;?>"
									<?php echo $checked;?>
						       	value="<?php echo $brand->j2store_manufacturer_id;?>"
						         />
					       <?php
						         //onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()"
						       ?>
						<?php echo $brand->company;?>

					</label>
				<?php
				endforeach;?>
			</div>
		</div>
		<?php endif;?>
	<?php endif;?>

	<!-- Vendors -->
		<?php if($this->params->get('list_show_vendor_filter', 0) && !empty($this->filters['vendors'])):?>
	<div class="j2store-product-filters j2store-product-vendor-filters">
		<div class="j2store-product-filters-header">
			<h4 class="product-filter-heading"><?php echo JText::_('J2STORE_PRODUCT_FILTER_BY_VENDOR'); ?></h4>
			<?php if(!empty($session_vendor_ids)):?>
				<a href="javascript:void(0);" onclick="resetJ2storeVendorFilter();" >
					<?php echo JText::_('J2STORE_CLEAR');?>
				</a>
			<?php endif; ?>
		</div>
		<div id="j2store-vendor-filter-container" class="control-group">
		<?php foreach($this->filters['vendors'] as $key => $vendor):
				$checked ='';
				if(!empty($session_vendor_ids) && in_array( $vendor->j2store_vendor_id , $session_vendor_ids)){
					$checked ="checked ='checked'";
				}
		?>
			<label class="j2store-product-vendor-label">
				<input type="checkbox" class="j2store-vendor-checkboxes"  id="vendor-input-<?php echo $vendor->j2store_vendor_id ;?>"
				       name="vendor_ids[]"     <?php echo $checked;?>   value="<?php echo $vendor->j2store_vendor_id ;?>"  />
	  				    <!--
	  				    onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()"
	  				     onchange="jQuery('#j2store-product-loading').show();this.form.submit()" -->
				   	<?php echo $vendor->first_name .' '.$vendor->last_name;?>
			</label>
		<?php endforeach;?>
		</div>
	</div>
	<?php endif;?>


	<?php if($this->params->get('list_show_product_filter', 0)):?>
	<!-- Product Filters  -->
	<div class="j2store-product-filters productfilters-list">
			<?php $active_class='';?>

			<?php foreach ($this->filters['productfilters'] as $filtergroup):?>
				<div class="product-filter-group <?php echo F0FInflector::underscore($filtergroup['group_name']);?>">
						<h4 class="product-filter-heading"><?php echo $filtergroup['group_name'];?></h4>
						<span>
							<?php if($this->params->get('list_filter_productfilter_toggle',1)==1):?>
								<a href="javascript:void(0);" id="pf-filter-icon-minus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"   onclick="getPFFilterToggle('<?php echo F0FInflector::underscore($filtergroup['group_name']);?>');"><i class="icon-minus"></i></a>
								<a href="javascript:void(0);" id="pf-filter-icon-plus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>" onclick="getPFFilterToggle('<?php echo F0FInflector::underscore($filtergroup['group_name']);?>');" style="display:none;" ><i class="icon-plus"></i></a>
							<?php elseif($this->params->get('list_filter_productfilter_toggle',1)==2):?>
								<a href="javascript:void(0);" id="pf-filter-icon-plus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"  onclick="getPFFilterToggle('<?php echo F0FInflector::underscore($filtergroup['group_name']);?>');" ><i class="icon-plus"></i></a>
								<a href="javascript:void(0);" id="pf-filter-icon-minus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"   onclick="getPFFilterToggle('<?php echo F0FInflector::underscore($filtergroup['group_name']);?>');" style="display:none;" ><i class="icon-minus"></i></a>
							<?php endif;?>
						<?php if(!empty($session_productfilter_ids) ):?>
							<a href="javascript:void(0);"
							    data-class="j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"
							    id="product-filter-group-clear-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"
								style="display:none;"
								 onclick="resetJ2storeProductFilter('j2store-pfilter-checkboxes-<?php  echo F0FInflector::underscore($filtergroup['group_name']);?>');"
								 >
								<?php echo JText::_('J2STORE_CLEAR');?>
							</a>
							<?php endif; ?>
						</span>
				</div>

				<?php if($this->params->get('list_filter_productfilter_toggle',1)==1):?>
				<div id="j2store-pf-filter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>" class="control-group j2store-productfilter-list"   <?php echo 'style="display:block;"';?> >
				<?php elseif($this->params->get('list_filter_productfilter_toggle',1)==2):?>
					<div id="j2store-pf-filter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>" class="control-group j2store-productfilter-list"   <?php echo 'style="display:none;"';?> >
				<?php else:?>
				<div id="j2store-pf-filter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>" class="control-group j2store-productfilter-list">
				<?php endif;?>

					<?php foreach($filtergroup['filters'] as $i =>$filter):
						$checked ='';
						if(!empty($session_productfilter_ids) && in_array( $filter->filter_id ,$session_productfilter_ids)){
							$checked ="checked ='checked'";
						}
					?>
					<label class="j2store-productfilter-label">

						<input class="j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>"
								id="j2store-pfilter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>-<?php echo $filter->filter_id ;?>"
								type="checkbox" name="productfilter_ids[]"
								<?php echo $checked;?>
						value="<?php echo $filter->filter_id ;?>"  />
						<!-- onclick="document.getElementById('j2store-product-loading').style.display='block';document.getElementById('productsideFilters').submit()" -->
							<?php echo $filter->filter_name; ?>
					</label>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
	</div>
	<?php endif;?>

	<?php echo J2Html::hidden('option','com_j2store');?>
	<?php echo J2Html::hidden('view','products');?>
	<?php echo J2Html::hidden('task','browse');?>
	<?php echo J2Html::hidden('Itemid', JFactory::getApplication()->input->getUint('Itemid'));?>
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
<script type="text/javascript">

/**
 * Method to Submit the form when search Btn clicked
 */
jQuery("#filterProductsBtn").on('click',function(){
	jQuery("#j2store-product-loading").show();
	jQuery("#productsideFilters").submit();
}) ;

jQuery('document').ready(function (){
	<?php foreach ($this->filters['productfilters'] as $filtergroup):?>
	<?php foreach($filtergroup['filters'] as $i =>$filter):?>
	var size = jQuery('.j2store-pfilter-checkboxes-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>:checked').length;
		if(size > 0){
			console.log(size);
			jQuery('#product-filter-group-clear-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>').show();
			jQuery('#j2store-pf-filter-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>').show();
			jQuery('#pf-filter-icon-plus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>').hide();
			jQuery('#pf-filter-icon-minus-<?php echo F0FInflector::underscore($filtergroup['group_name']);?>').show();
		}
	<?php endforeach;?>
	<?php endforeach;?>
});
</script>
<?php if($this->params->get('list_show_filter_price', 0) && isset($this->filters['pricefilters']) && count($this->filters['pricefilters'])): ?>
<script type="text/javascript">
//assign the values for price filters
var min_value = jQuery( "#min_price" ).html();
var max_value = jQuery( "#max_price" ).html();
(function($) {
	$( "#j2store-slider-range" ).slider({
		range: true,
		min: <?php echo $min_price;?>,
		max: <?php echo $max_price;?>,
		values: [ min_value,max_value],
		slide: function( event, ui ) {
		$( "#amount1" ).val( "<?php echo $currency;?>" + ui.values[ 0 ] + " - <?php echo $currency;?>" + ui.values[ 1 ] );
			$( "#min_price" ).html(ui.values[ 0 ]);
			$( "#max_price" ).html(  ui.values[ 1 ] );

			$( "#min_price_input" ).attr('value', ui.values[ 0 ]);
			$( "#max_price_input" ).attr('value',  ui.values[ 1 ] );

		}
	});

})(j2store.jQuery);


</script>
<?php endif;?>

