<?php 
$title='cat_page_title';
$key='cat_keywords';
$des='cat_description';
$metas='cat_metas';
$val=get_option('cat_meta_key_'.$_GET['tag_ID']);
?>
<h2>分类目录SEO设置</h2>
<table class="form-table">
	<tbody>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $title ?>">自定义标题</label></th>
			<td><input name="<?php echo $title ?>" id="<?php echo $title ?>" type="text" value="<?php echo esc_attr(stripslashes($val['page_title'])); ?>" size="30"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $key; ?>">设置关键词</label></th>
			<td><input name="<?php echo $key; ?>" id="<?php echo $key; ?>" type="text" value="<?php echo $val['metakey']; ?>" size="40"></td>
		</tr>		
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $des; ?>">自定义描述</label></th>
			<td><textarea name="<?php echo $des; ?>" id="<?php echo $des; ?>" rows="5" cols="50" style="width: 97%;"><?php echo stripslashes($val['description']); ?></textarea></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $metas; ?>">Metas（非必填）</label></th>
			<td><textarea name="<?php echo $metas; ?>" id="<?php echo $metas; ?>" rows="1" cols="50" style="width: 97%;"><?php echo stripslashes($val['metas']); ?></textarea></td>
		</tr>	
	</tbody>
</table>