<?php
namespace Status\SocialNetwork\Application;

/**
 * Class UserResponseVK
 * @package Status\SocialNetwork\Application
 */
final class UserResponseVK
{
    /**
     * @var object
     */
    private $data;

    /**
     * UserResponseVK constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->data->response[0]->id;
    }

    /**
     * @return string
     */
    public function firstName()
    {
        return $this->data->response[0]->first_name;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->data->response[0]->last_name;
    }

    /**
     * @return string
     */
    public function birthDate()
    {
        return $this->data->response[0]->bdate;
    }

    /**
     * @return string
     */
    public function avatar50()
    {
        return $this->data->response[0]->photo_50;
    }

    /**
     * @return string
     */
    public function avatar100()
    {
        return $this->data->response[0]->photo_100;
    }

    /**
     * @return string
     */
    public function sex()
    {
        return $this->data->response[0]->sex;
    }

    /**
     * @return string|null
     */
    public function city()
    {
        return
            isset($this->data->response[0]->city->title)
                ? $this->data->response[0]->city->title
                : NULL;
    }

    /**
     * @return string|null
     */
    public function country()
    {
        return
            isset($this->data->response[0]->country->title)
                ? $this->data->response[0]->country->title
                : NULL;
    }

    /**
     * @return string|null
     */
    public function deactivated()
    {
        return
            isset($this->data->response[0]->deactivated)
                ? $this->data->response[0]->deactivated
                : NULL;
    }
}