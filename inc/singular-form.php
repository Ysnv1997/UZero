<?php
	$id=get_the_ID();
	$val=get_post_meta($id,'_web589_singular_meta',true);	
	$title='title';
	$keywords='keywords';
	$description='description';
	$metas='code';
?>
<form action="" method="post">
<p>
	<label for="<?php echo $title; ?>_meta" style="display:block;padding-bottom:10px;"><b>自定义标题</b></label>
    <?php $val_title = isset($val['title']) ? $val['title'] : ''; ?>
	<input type="text" name="<?php echo $title; ?>" id="<?php echo $title; ?>_meta" value="<?php echo esc_attr($val_title); ?>" size="120" />
</p>

<p style="clear:both">
	<label for="<?php echo $keywords; ?>" style="display:block;padding-bottom:10px;"><b>设置关键词</b></label>
    <?php $val_keywords = isset($val['keywords']) ? $val['keywords'] : ''; ?>
	<input type="text" name="<?php echo $keywords; ?>" id="<?php echo $keywords; ?>" value="<?php echo $val_keywords; ?>" size="120" />
</p>
<p>
	<label for="<?php echo $description; ?>" style="display:block;padding-bottom:10px;" ><b>自定义描述</b></label>
    <?php $val_description = isset($val['description']) ? $val['description'] : ''; ?>
	<textarea name="<?php echo $description; ?>" id="<?php echo $description; ?>" cols="120" rows="3"><?php echo $val_description; ?></textarea>
</p>
<p>
	<label for="<?php echo $metas; ?>" style="display:block;padding-bottom:10px;"><b>Metas（非必填）</b></label>
    <?php $val_code = isset($val['code']) ? $val['code'] : ''; ?>
	<textarea name="<?php echo $metas; ?>" id="<?php echo $metas; ?>" cols="120" rows="1"><?php echo $val_code; ?></textarea>
</p>
	<input type="hidden" name="meta_save" value="on"/>
</form>