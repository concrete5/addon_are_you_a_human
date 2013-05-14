<?defined('C5_EXECUTE') or die(_("Access Denied."));
//var_dump($product);

$captchaLink = '<a href="'.$this->url('/dashboard/system/permissions/captcha/').'" target="_blank">'.t('captcha configuration').'</a>';
?>
<script type="text/javascript">
window.location.href="<?=$this->url('/dashboard/system/permissions/captcha/','view',t('New captcha system installed.'))?>";
</script>

<h1><?= t('Are You Human') ?></h1>
<h4><?= t('You installed the new captcha system. Go to the system %s to complete setup.',$captchaLink) ?></h4>
