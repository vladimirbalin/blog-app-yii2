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
        $cookieLanguage = $cookies->getValue('lan', 'en-US');
        if (in_array($cookieLanguage, $this->_supportedLanguages)) {
            $app->language = $cookieLanguage;
        } else {
            $app->language = 'en-US';
        }
    }

    public static function isRuActive()
    {
        return 'ru-RU' === \Yii::$app->request->cookies->getValue('lan', 'en-US');
    }

    public static function isEnActive()
    {
        return 'en-US' === \Yii::$app->request->cookies->getValue('lan', 'en-US') ||
            'en-EN' === \Yii::$app->request->cookies->getValue('lan', 'en-US');
    }
}