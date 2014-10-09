<?php
namespace Concrete\Package\AreYouAHuman\Src\Captcha;

class AreYouAHumanController extends \Concrete\Core\Captcha\Controller
{

    /** @var \Package */
    protected $package;

    /** @var \Concrete\Package\AreYouAHuman\Src\AYAH\AYAH */
    protected $ayah;

    public function saveOptions($args)
    {
        $this->getPackage()->getConfig()->save('token.publisher_key', $args['ARE_YOU_A_HUMAN_PUBLISHER_KEY']);
        $this->getPackage()->getConfig()->save('token.scoring_key', $args['ARE_YOU_A_HUMAN_SCORING_KEY']);
    }

    public function display()
    {
        $page = \Page::getCurrentPage();
        if (is_object($page) && $page->isEditMode()) {
            echo '<div class="ccm-edit-mode-disabled-item" style="width: 360px; height: 50px"><div style="margin: 15px auto;">' . t(
                    'Captcha is disabled in edit mode.') . '</div></div>';
            return;
        }
        echo $this->getAyah()->getPublisherHTML();
    }

    public function label()
    {
        \Loader::helper('form')->label('captcha', t('Are you a human?'));
    }

    public function showInput()
    {
    }

    public function check()
    {
        return $this->getAyah()->scoreResult();
    }

    /**
     * @return \Package
     */
    public function getPackage()
    {
        if (!$this->package) {
            $this->package = \Package::getByHandle('are_you_a_human');
        }
        return $this->package;
    }

    /**
     * @return \Concrete\Package\AreYouAHuman\Src\AYAH\AYAH
     */
    public function getAyah()
    {
        if (!$this->ayah) {

            $this->ayah = new \Concrete\Package\AreYouAHuman\Src\AYAH\AYAH(
                array(
                    'publisher_key' => $this->getPackage()->getConfig()->get('token.publisher_key'),
                    'scoring_key'   => $this->getPackage()->getConfig()->get('token.scoring_key')
                ));
        }
        return $this->ayah;
    }

}
