<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

Loader::model('package');
$form = Loader::helper('form');
$pkg = Package::getByHandle('are_you_a_human');
$ayahLink = '<a href="http://areyouahuman.com/" target="_blank">'.t('Are You A Human').'</a>';
$docsLink = '<a href="http://www.concrete5.org/marketplace/addons/are_you_a_human/documentation/" target="_blank">'.t('documentation').'</a>';
?>

<div class="clearfix">
	<?= $form->label('ARE_YOU_A_HUMAN_PUBLISHER_KEY', t('Publisher Key')) ?>
	<div class="input">
		<?= $form->text('ARE_YOU_A_HUMAN_PUBLISHER_KEY', $pkg->config('ARE_YOU_A_HUMAN_PUBLISHER_KEY')) ?>
	</div>
</div>


<div class="clearfix">
	<?= $form->label('ARE_YOU_A_HUMAN_SCORING_KEY', t('Scoring Key')) ?>
	<div class="input">
		<?= $form->text('ARE_YOU_A_HUMAN_SCORING_KEY', $pkg->config('ARE_YOU_A_HUMAN_SCORING_KEY')) ?>
	</div>
</div>

<div class="well">
	<h4 style="margin-bottom:12px;"><?= t('Not sure what to do here?')?></h4>
	<p><?= t('You will need an %s account first.',$ayahLink) ?></p>
	<p><?=t('If you need more information, check out our %s.',$docsLink)?></p>
</div>
	
