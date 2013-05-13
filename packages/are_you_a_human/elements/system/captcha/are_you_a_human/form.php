<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

Loader::model('package');
$form = Loader::helper('form');
$pkg = Package::getByHandle('are_you_a_human');
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
