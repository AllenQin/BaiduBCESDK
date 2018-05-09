<?php
namespace allenqin\baiduYunBCE;
use BaiduBce\Services\Lss\LssClient;

class Client
{
    private static $_instance;
    private static $config;
    private $LSSClient;

    private function __construct()
    {
        include('./BaiduBce.phar');
        $this->LSSClient = new LssClient(self::$config);
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
    public function getLSSClient()
    {
        return $this->LSSClient;
    }
}
