<?php
namespace vl_anufriev\widgets\mappicker;

use yii\web\AssetBundle;

/**
 * Class MapYandexAsset
 * @package vl_anufriev\widgets\mappicker
 */
class MapYandexAsset extends AssetBundle{

    public static $apiKey = '';
    /**
     * @var string map language
     */
    public static $language = 'en_US';
    /**
     * @var string yandex map api version
     */
    public static $version = '2.1';
    /**
     * @var string service url
     */
    public $serviceUrl = 'https://api-maps.yandex.ru';
    /**
     * @var string assets source path
     */
    public $sourcePath = '@vl_anufriev/widgets/mappicker/assets';
    /**
     * @var array js options
     */
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    /**
     * @var array need js array
     */
    public $js = [
        'js/yandex-map.js'
    ];

    /**
     * Register service library
     */
    public function init(){
        parent::init();
        $this->js[] = $this->getMapLibrary();
    }

    /**
     * @return string build service library url
     */
    protected function getMapLibrary(){
        $libraryUrl = $this->serviceUrl.'/'.self::$version.'/?';
        $libraryUrl .= http_build_query([
            'lang' => self::$language,
            'apikey' => self::$apiKey
        ]);
        return $libraryUrl;
    }
}
