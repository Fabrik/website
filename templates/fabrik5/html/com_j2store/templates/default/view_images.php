<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;
$image_path = JUri::root();
$main_image="";
$main_image_width = $this->params->get('item_product_main_image_width', '200');
$additional_image_width = $this->params->get('item_product_additional_image_width', '100');
//var_dump($this->product);
?>
	<?php if($this->params->get('item_show_product_main_image', 1) && !empty($this->product->main_image)):?>
	<div class="j2store-mainimage">
		   <?php $main_image = $this->product->main_image; ?>
		   <?php if($main_image &&  JFile::exists(JPATH_SITE.'/'.$main_image)):?>
		   <?php $class= $this->params->get('item_enable_image_zoom', 1) ? 'zoom': 'nozoom'; ?>

		   <span class="<?php echo $class; ?>" id="j2store-item-main-image-<?php echo $this->product->j2store_product_id; ?>">
		  	 <img itemprop="image"
		  	 alt="<?php echo $this->product->product_name ;?>"
		  	 class="j2store-product-main-image j2store-img-responsive"
		  	 src="<?php echo $image_path.$main_image;?>"
		  	 width="<?php echo intval($main_image_width); ?>"
		  	 />
		  	 </span>
		   <?php endif; ?>
	</div>
	<script type="text/javascript">
		var main_image="<?php echo $image_path.$main_image ;?>";
		j2store.jQuery(document).ready(function(){
			var enable_zoom = <?php echo $this->params->get('item_enable_image_zoom', 1);?>;
			if(enable_zoom){
				j2store.jQuery('#j2store-item-main-image-<?php echo $this->product->j2store_product_id; ?>').zoom();
			}
		});
	</script>
	 <?php endif; ?>

	 <?php if( $this->params->get('item_show_product_additional_image', 1) && isset($this->product->additional_images) && !empty($this->product->additional_images)):?>
	 	<?php
	 		$additional_images = json_decode($this->product->additional_images);
	 		$additional_images = array_filter((array)$additional_images);
	 		if(count($additional_images)) :
	 	?>
			<div class="j2store-product-additional-images">

				<ul class="additional-image-list">
					<?php
						foreach($additional_images as $key => $image):?>
						<?php
						if(JFile::exists(JPATH_SITE.'/'.$image)):
							$image_src = $image_path.$image;
							 	?>
						<li>
							<img onmouseover="setMainPreview('addimage-<?php echo $this->product->j2store_product_id; ?>-<?php echo $key;?>', <?php echo $this->product->j2store_product_id; ?>, <?php echo $this->params->get('item_enable_image_zoom', 1); ?>, 'inner')"
								 onclick="setMainPreview('addimage-<?php echo $this->product->j2store_product_id; ?>-<?php echo $key;?>', <?php echo $this->product->j2store_product_id; ?>, <?php echo $this->params->get('item_enable_image_zoom', 1); ?>, 'inner')"
								 id="addimage-<?php echo $this->product->j2store_product_id; ?>-<?php echo $key;?>"
								 class="j2store-item-additionalimage-preview j2store-img-responsive"
								 src="<?php echo $image_src;?>"
								 alt="<?php echo $this->product->product_name; ?>"
								 width="<?php echo intval( $additional_image_width); ?>"
								 />
						</li>
					<?php endif;?>
					<?php endforeach;?>
						<li>
							 <img onmouseover="setMainPreview('additial-main-image-<?php echo $this->product->j2store_product_id; ?>', <?php echo $this->product->j2store_product_id; ?>, <?php echo $this->params->get('item_enable_image_zoom', 1); ?>, 'inner')"
								  onclick="setMainPreview('additial-main-image-<?php echo $this->product->j2store_product_id; ?>', <?php echo $this->product->j2store_product_id; ?>, <?php echo $this->params->get('item_enable_image_zoom', 1); ?>, 'inner')"
								  id="additial-main-image-<?php echo $this->product->j2store_product_id; ?>"
							 	  alt="<?php echo $this->product->product_name ;?>"
							 	  class="j2store-item-additionalimage-preview j2store-img-responsive"
							 	  src="<?php echo $image_path.$main_image;?>"
							 	  width="<?php echo intval($additional_image_width); ?>"
							 	/>
						</li>
				</ul>
			</div>
			<?php endif;?>
		<?php endif;?>