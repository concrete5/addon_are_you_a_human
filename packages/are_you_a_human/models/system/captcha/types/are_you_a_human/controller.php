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
		$page = Page::getCurrentPage();
		if (
		    !is_object($page)
		    ||
		    $page->isEditMode()
		    ||
		    Loader::helper('concrete/dashboard')->inDashboard($page)
		) {
			echo '<div class="ccm-edit-mode-disabled-item" style="width: 360px; height: 50px"><div style="margin: 15px auto;">' . t('Captcha is disabled in edit mode.') . '</div></div>';
			return;
		}
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
