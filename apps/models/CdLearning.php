<?php
namespace Modules\Models;
class CdLearning extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $learid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
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
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $couid;

    /**
     * Method to set the value of field learid
     *
     * @param integer $learid
     * @return $this
     */
    public function setLearid($learid)
    {
        $this->learid = $learid;

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
     * Returns the value of field learid
     *
     * @return integer
     */
    public function getLearid()
    {
        return $this->learid;
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
        $this->setSource("cd_learning");
        $this->belongsTo('couid', '\CdCourse', 'couid', ['alias' => 'CdCourse']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_learning';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdLearning[]|CdLearning|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdLearning|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
