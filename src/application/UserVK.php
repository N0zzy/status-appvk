<?php
namespace Status\SocialNetwork\Application;

/**
 * Class UserVK
 * @package Status\SocialNetwork\Application
 */
final class UserVK
{
    /**
     * @var
     */
    private static $userId;
    /**
     * @var
     */
    private static $version;
    /**
     * @var
     */
    private static $accessToken;
    /**
     * @var
     */
    private static $result;

    /**
     * @param $userId
     * @param string $accessToken
     * @return UserVK
     */
    public static function get($userId, string $accessToken)
    {
        self::$userId = $userId;
        self::$version = constant("VK_APP_VERSION_METHOD");
        self::$accessToken = $accessToken;
        self::$result = self::make();
        return new self();
    }

    /**
     * @return false|string
     */
    private static function make()
    {
        $request_params = array(
            'user_id' => self::$userId,
            'fields' => 'bdate,photo_50,photo_100,sex,city,country,domain,verified,status,deactivated',
            'v' => self::$version,
            'access_token' => self::$accessToken
        );

        $get_params = http_build_query($request_params);

        return file_get_contents('https://api.vk.com/method/users.get?'. $get_params);
    }

    /**
     * @return mixed
     */
    public function allJson()
    {
        return self::$result;
    }

    /**
     * @return mixed
     */
    public function allArray()
    {
        return json_decode(self::$result,true);
    }

    /**
     * @return UserResponseVK
     */
    public function all()
    {
        return new UserResponseVK(json_decode(self::$result));
    }
}