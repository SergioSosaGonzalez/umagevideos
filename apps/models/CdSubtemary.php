<?php
namespace Modules\Models;
class CdSubtemary extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $sutemid;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $subtitle;

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
    protected $temid;

    /**
     * Method to set the value of field sutemid
     *
     * @param integer $sutemid
     * @return $this
     */
    public function setSutemid($sutemid)
    {
        $this->sutemid = $sutemid;

        return $this;
    }

    /**
     * Method to set the value of field subtitle
     *
     * @param string $subtitle
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

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
     * Returns the value of field sutemid
     *
     * @return integer
     */
    public function getSutemid()
    {
        return $this->sutemid;
    }

    /**
     * Returns the value of field subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
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
     * Returns the value of field temid
     *
     * @return integer
     */
    public function getTemid()
    {
        return $this->temid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_subtemary");
        $this->hasMany('sutemid', 'CdVideos', 'sutemid', ['alias' => 'CdVideos']);
        $this->belongsTo('temid', '\CdTemary', 'temid', ['alias' => 'CdTemary']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_subtemary';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubtemary[]|CdSubtemary|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubtemary|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
