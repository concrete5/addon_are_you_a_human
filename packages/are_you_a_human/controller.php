<?php
namespace Concrete\Package\AreYouAHuman;

use Concrete\Core\Captcha\Library;
use Concrete\Core\Foundation\ClassLoader;

class Controller extends \Concrete\Core\Package\Package
{

    protected $pkgHandle = "are_you_a_human";
    protected $appVersionRequired = "5.5";
    protected $pkgVersion = "1.0.1";

    public function getPackageName()
    {
        return t('Are You A Human');
    }

    public function getPackageDescription()
    {
        return t('Are You A Human? Captcha');
    }

    public function install()
    {
        $pkg = parent::install();
        Library::add('are_you_a_human', t('Are You A Human'), $pkg);
    }

}
