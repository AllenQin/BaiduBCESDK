<?php
namespace allenqin\baiduYunBCE;
use BaiduBce\Services\Lss\LssClient;

class Client
{
    private static $_instance;
    private static $config;
    private $lssClient;

    private function __construct()
    {
        include('./BaiduBce.phar');
        $this->lssClient = new LssClient(self::$config);
    }

    /**
     * 唯一实例
     *
     * @param $config
     * @return BaiduLssClient
     */
    public static function getInstance($config)
    {
        if (!self::$_instance) {
            self::$config = $config;
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * 获取BCE客户端实例
     *
     * @return LssClient
     */
    public function getLssClient()
    {
        return $this->lssClient;
    }
}
