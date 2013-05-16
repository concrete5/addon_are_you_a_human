<?defined('C5_EXECUTE') or die(_("Access Denied."));

$captchaLink = '<a href="'.$this->url('/dashboard/system/permissions/captcha/').'" target="_blank">'.t('captcha configuration').'</a>';
$docsLink = '<a href="http://www.concrete5.org/marketplace/addons/are_you_a_human/documentation/" target="_blank">'.t('documentation').'</a>';
$ayahLink = '<a href="http://areyouahuman.com/" target="_blank">'.t('Are You A Human').'</a>';
?>

<h2 style="margin-bottom:12px"><?= t('Are You Human') ?></h2>
<p><?= t('You installed the new captcha system. Go to the system %s to complete setup.',$captchaLink) ?></p>
<p><?= t('Check out our %s first if you want to learn more about how to get started with the %s captcha system.',$docsLink,$ayahLink) ?></p>
