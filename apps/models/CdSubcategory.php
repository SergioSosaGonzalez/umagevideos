<?php

namespace Modules\Models;
class CdSubcategory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $subid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
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
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $catid;

    /**
     * Method to set the value of field subid
     *
     * @param integer $subid
     * @return $this
     */
    public function setSubid($subid)
    {
        $this->subid = $subid;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Method to set the value of field catid
     *
     * @param integer $catid
     * @return $this
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Returns the value of field subid
     *
     * @return integer
     */
    public function getSubid()
    {
        return $this->subid;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Returns the value of field catid
     *
     * @return integer
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_subcategory");
        $this->hasMany('subid', 'CdCourse', 'subid', ['alias' => 'CdCourse']);
        $this->belongsTo('catid', '\CdCategory', 'catid', ['alias' => 'CdCategory']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_subcategory';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubcategory[]|CdSubcategory|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubcategory|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
