<?php


namespace app\components;


use yii\base\Application;

class LanguageSelector implements \yii\base\BootstrapInterface
{
    private array $_supportedLanguages = ['en-US', 'ru-RU'];

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $cookies = $app->request->cookies;
        $cookieLanguage = $cookies->getValue('lan', 'en-EN');
        if (in_array($cookieLanguage, $this->_supportedLanguages)) {
            $app->language = $cookieLanguage;
        } else {
            $app->language = 'en-EN';
        }
    }
}