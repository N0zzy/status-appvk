<?php
namespace Status\SocialNetwork\Application;

/**
 * Class VK
 * @package Status\SocialNetwork\Application
 */
class VK
{
    /**
     * @var
     */
    private static $response;

    /**
     * @param array $response
     * @return VK
     */
    public static function get(array $response): VK
    {
        self::$response = $response;
        return new self();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function sid()
    {
        return self::getValueResponse('sid');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function aid()
    {
        return self::getValueResponse('api_id');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function uid()
    {
        return self::getValueResponse('user_id');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function vid()
    {
        return self::getValueResponse('viewer_id');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function token()
    {
        return self::getValueResponse('access_token');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function secret()
    {
        return self::getValueResponse('secret');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function authKey()
    {
        return self::getValueResponse('auth_key');
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    private static function getValueResponse(string $key)
    {
        if(!array_key_exists($key, self::$response))
            throw new \Exception('error response application key');

        return self::$response[$key];
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function verifity(): VK
    {
        $appId = intval(constant('VK_APP_ID'));

        if(intval($this->aid()) !== $appId AND !empty($appId))
            throw new \Exception('app id not found');

        return new self();
    }
}