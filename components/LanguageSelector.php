<?php


namespace app\components;


use yii\base\Application;

class LanguageSelector implements \yii\base\BootstrapInterface
{
    private array $supportedLanguages = ['en-US', 'ru-RU'];
    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $cookieLanguage = $app->request->cookies['lan'];
        if(isset($cookieLanguage) && in_array($cookieLanguage, $this->supportedLanguages)){
            $app->language = $cookieLanguage;
        }else {
            $app->language = 'en-EN';

        }
    }
}