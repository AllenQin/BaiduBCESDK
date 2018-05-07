<?php
namespace allenqin\baiduYun;
use BaiduBce\Services\Lss\LssClient;

class BaiduLssClient
{
    private static $_instance;
    private static $config;
    private $client;

    private function __construct()
    {
        include('./BaiduBce.phar');
        $this->client = new LssClient(self::$config);
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
    public function getClient()
    {
        return $this->client;
    }
}
