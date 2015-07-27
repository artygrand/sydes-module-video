<div class="row">

<?php foreach ($result as $item){ ?>

	<div class="col-sm-3">
		<a href="<?=$item['src'];?>" title="<?=$item['title'];?>" class="various fancybox.iframe">
			<img src="<?=$item['img'];?>" style="width:<?=$args['width'];?>px;height:<?=$args['height'];?>px;">
		</a>
		<div class="title"><?=$item['title'];?></div>
	</div>

<?php } ?>

</div>