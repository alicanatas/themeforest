<div class="defaultsSelector">
<h3 class="csh3title" title="<?php _e('Click to toggle', 'custom-sidebars'); ?>"><?php _e('By post type','custom-sidebars'); ?></h3>
<div id="posttypes-default" class="meta-box-holder defaultsContainer">
	<?php foreach($post_types as $pt): $post_type_object = get_post_type_object($pt);?>
	<div id="pt-<?php echo $pt; ?>" class="postbox closed" >
		<div class="handlediv" title="Click to open"><br /></div>
		<h3 class='hndle'><span><?php _e($post_type_object->label); ?></span></h3>
		
		<div class="inside">
		<?php if(!empty($modifiable)): foreach($modifiable as $m): $sb_name = $allsidebars[$m]['name'];?>
			<p><?php echo $sb_name; ?>: 
				<select name="type_posts_<?php echo $pt;?>_<?php echo $m;?>">
					<option value=""></option>
				<?php foreach($allsidebars as $key => $sb):?>
					<option value="<?php echo $key; ?>" <?php echo (isset($defaults['post_type_posts'][$pt][$m]) && $defaults['post_type_posts'][$pt][$m]==$key) ? 'selected="selected"' : ''; ?>>
						<?php echo $sb['name']; ?>
					</option>
				<?php endforeach;?>
				</select>
                    <?php if(!isset($cs_is_defaults)): ?>
                        <a href="#" class="selectSidebar"><?php printf(__('<- Set %s here.', 'custom-sidebars'), $current_sidebar['name']); ?></a>
                    <?php endif; ?>
			</p>
		<?php endforeach;else:?>
			<p><?php _e('There are no replaceable sidebars selected. You must select some of them in the form above to be able for replacing them in all the post type entries.','custom-sidebars'); ?></p>
		<?php endif;?>
		</div>
		
	</div>
	
	<?php endforeach; ?>
</div> 
</div>