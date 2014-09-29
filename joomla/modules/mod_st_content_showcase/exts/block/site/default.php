<?php
/**
 * @copyright	submit-templates.com
 * @license		GNU General Public License version 2 or later;
 */
if (count($list) < 3) {
	return;
}
?>
<div class="st-block">
	<div class="row-fluid">
		<div class="span6">
			<div class="intro clearfix">
				<?php $item = $list[0]; ?>
				<div class="image">
				<?php switch($params->get('image_link')){
					case 0: ?>
						<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
					<?php break; case 1:?>
					<a  href="<?php echo $item->link; ?>" >
						<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
					</a>
					<?php break; case 2:?>
					<a  href="<?php echo $item->image_large	; ?>">
						<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
					</a>
				<?php break; }; ?>
				</div>
				
				<?php if ($params->get('title')): ?>
					<h3 class="title">
					<?php if ($params->get('title_link', 1)): ?>
					<a href="<?php echo $item->link;?>">
							<?php echo $item->title;?></a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
					</h3>
				<?php endif ?>
				
				<?php if (isset($item->publish_up) ): ?>
				<div class="date">
					<?php if (isset($item->publish_up)): ?>
						<?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC2')); ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				
				<?php if ($params->get('introtext')): ?>
				<div class="content">
					<p><?php echo ($params->get('introtext_length') > 0) ? substr(strip_tags($item->introtext), 0 , $params->get('introtext_length')) : strip_tags($item->introtext); ?></p>
				</div>
				<?php endif; ?>	
			</div>
		</div>
		
		<div class="span6">
			<?php unset($list[0]); ?>
			<?php foreach ($list as $k => $item): ?>
				<?php if ($k == 4) break; ?>
				<div class="items clearfix">
					<div class="image">
						<?php switch($params->get('image_link')){
							case 0: ?>
								<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
							<?php break; case 1:?>
							<a  href="<?php echo $item->link; ?>" >
								<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
							</a>
							<?php break; case 2:?>
							<a  href="<?php echo $item->image_large	; ?>">
								<img src="<?php echo htmlspecialchars($item->image_intro); ?>"  alt="<?php echo htmlspecialchars($item->title); ?>"/>
							</a>
						<?php break; }; ?>
					</div>
					
					<?php if ($params->get('title')): ?>
						<h3 class="title">
						<?php if ($params->get('title_link', 1)): ?>
						<a href="<?php echo $item->link;?>">
								<?php echo $item->title;?></a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>
						</h3>
					<?php endif ?>
					
					<div class="date"><?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC2')); ?></div>
					
					<?php if ($params->get('introtext')): ?>
					<div class="content">
						<p><?php echo ($params->get('introtext_length') > 0) ? substr(strip_tags($item->introtext), 0 , $params->get('introtext_length')) : strip_tags($item->introtext); ?></p>
					</div>
					<?php endif; ?>	
					
				</div>
			<?php endforeach; ?>		
		</div>	
	</div>
</div>