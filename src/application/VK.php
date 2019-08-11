<?php
namespace Status\SocialNetwork\Application;

/**
 * Class VK
 * @package Status\SocialNetwork\Application
 */
final class VK
{
    /**
     * @var array
     */
    private static $request = [];
    /**
     * @var
     */
    private static $appId;
    /**
     * @var string
     */
    private static $appSecret = '';

    /**
     * @param array $request
     * @return VK
     */
    public static function get(Array $request): VK
    {
        self::$request = $request;
        self::$appId = intval(env('VK_APP_ID'));
        self::$appSecret = (string)env('VK_APP_SECRET');
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
        if(!array_key_exists($key, self::$request))
            throw new \Exception('error response application key', 500);

        return self::$request[$key];
    }

    /**
     * @return VK
     * @throws \Exception
     */
    public function verify(): VK
    {
        $this->verifyAppId();
        $this->verifyAuthKey();
        return new self();
    }

    /**
     * @throws \Exception
     */
    private function verifyAppId()
    {
        if(intval($this->aid()) !== self::$appId AND !empty(self::$appId))
            throw new \Exception('app id not found', 500);
    }

    /**
     * @throws \Exception
     */
    private function verifyAuthKey()
    {
        $auth = md5(self::$appId.'_'.$this->vid().'_'.self::$appSecret);
        if($this->authKey() !== $auth )
            throw new \Exception('auth key not found', 500);
    }
}