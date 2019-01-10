<?php
namespace Status\App;

/**
 * Class VK
 * @package Status\App
 */
class VK
{
    private static $response;

    public static function get($response)
    {

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
        {
            throw new \Exception('error response app key');
        }

        return self::$response[$key];
    }
}