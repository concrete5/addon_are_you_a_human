<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class AreYouAHumanPackage extends Package {

	protected $pkgHandle = "are_you_a_human";
	protected $appVersionRequired = "5.5";
	protected $pkgVersion = "0.9.1";

	public function getPackageName() {
		return t('Are You A Human');
	}

	public function getPackageDescription() {
		return t('Are You A Human? Captcha');
	}
	
	public function install() {
		$pkg = parent::install();
		Loader::model('system/captcha/library');
		SystemCaptchaLibrary::add('are_you_a_human', t('Are You A Human'), $pkg);
	}
}
