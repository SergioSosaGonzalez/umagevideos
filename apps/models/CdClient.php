<?php
namespace Modules\Models;
class CdClient extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $clieid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $names;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $last_name;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $img;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $type_user;

    /**
     * Method to set the value of field clieid
     *
     * @param integer $clieid
     * @return $this
     */
    public function setClieid($clieid)
    {
        $this->clieid = $clieid;

        return $this;
    }

    /**
     * Method to set the value of field names
     *
     * @param string $names
     * @return $this
     */
    public function setNames($names)
    {
        $this->names = $names;

        return $this;
    }

    /**
     * Method to set the value of field last_name
     *
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field img
     *
     * @param string $img
     * @return $this
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Method to set the value of field type_user
     *
     * @param string $type_user
     * @return $this
     */
    public function setTypeUser($type_user)
    {
        $this->type_user = $type_user;

        return $this;
    }

    /**
     * Returns the value of field clieid
     *
     * @return integer
     */
    public function getClieid()
    {
        return $this->clieid;
    }

    /**
     * Returns the value of field names
     *
     * @return string
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * Returns the value of field last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Returns the value of field type_user
     *
     * @return string
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }



    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_client");
        $this->hasMany('clieid', 'CdClientCourse', 'clieid', ['alias' => 'CdClientCourse']);
        $this->hasMany('clieid', 'CdCourse', 'clieid', ['alias' => 'CdCourse']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_client';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdClient[]|CdClient|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdClient|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
