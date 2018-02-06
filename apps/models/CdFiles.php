<?php
namespace Modules\Models;
class CdFiles extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $filid;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $name;

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
    protected $sutemid;

    /**
     * Method to set the value of field filid
     *
     * @param integer $filid
     * @return $this
     */
    public function setFilid($filid)
    {
        $this->filid = $filid;

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
     * Returns the value of field filid
     *
     * @return integer
     */
    public function getFilid()
    {
        return $this->filid;
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
     * Returns the value of field date_creation
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->date_creation;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_files");
        $this->belongsTo('sutemid', '\CdSubtemary', 'sutemid', ['alias' => 'CdSubtemary']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_files';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdFiles[]|CdFiles|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdFiles|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
