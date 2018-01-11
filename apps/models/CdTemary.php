<?php
namespace Modules\Models;
class CdTemary extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $temid;

    /**
     *
     * @var string
     * @Column(type="string", length=150, nullable=true)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $permalink;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $couid;

    /**
     * Method to set the value of field temid
     *
     * @param integer $temid
     * @return $this
     */
    public function setTemid($temid)
    {
        $this->temid = $temid;

        return $this;
    }

    /**
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field permalink
     *
     * @param string $permalink
     * @return $this
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Method to set the value of field date_creation
     *
     * @param string $date_creation
     * @return $this
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Method to set the value of field couid
     *
     * @param integer $couid
     * @return $this
     */
    public function setCouid($couid)
    {
        $this->couid = $couid;

        return $this;
    }

    /**
     * Returns the value of field temid
     *
     * @return integer
     */
    public function getTemid()
    {
        return $this->temid;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Returns the value of field date_creation
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Returns the value of field couid
     *
     * @return integer
     */
    public function getCouid()
    {
        return $this->couid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_temary");
        $this->hasMany('temid', 'CdSubtemary', 'temid', ['alias' => 'CdSubtemary']);
        $this->belongsTo('couid', '\CdCourse', 'couid', ['alias' => 'CdCourse']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_temary';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdTemary[]|CdTemary|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdTemary|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
