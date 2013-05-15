<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class AreYouAHumanSystemCaptchaTypeController extends SystemCaptchaTypeController {

	public function __construct() {
		Loader::library('3rdparty/ayah/ayah', 'are_you_a_human');
		Loader::model('package');
		$this->pkg = Package::getByHandle('are_you_a_human');
		if (!defined('AYAH_PUBLISHER_KEY')) {
			define('AYAH_PUBLISHER_KEY', $this->pkg->config('ARE_YOU_A_HUMAN_PUBLISHER_KEY'));
		}
		if (!defined('AYAH_SCORING_KEY')) {
			define('AYAH_SCORING_KEY',   $this->pkg->config('ARE_YOU_A_HUMAN_SCORING_KEY'));
		}
		$this->ayah = new AYAH;
	}

	public function saveOptions($args) {
		$this->pkg->saveConfig('ARE_YOU_A_HUMAN_PUBLISHER_KEY', $args['ARE_YOU_A_HUMAN_PUBLISHER_KEY']);
		$this->pkg->saveConfig('ARE_YOU_A_HUMAN_SCORING_KEY', $args['ARE_YOU_A_HUMAN_SCORING_KEY']);
	}

	public function display() {
		echo $this->ayah->getPublisherHTML();
	}

	public function label() {
		Loader::helper('form')->label('captcha', t('Are you a human?'));
	}

	public function showInput() {}

	public function check() {
		return $this->ayah->scoreResult();
	}
}
