<?php
namespace Modules\Models;
class CdRequeriments extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $reqid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $requeriments;

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
     * Method to set the value of field reqid
     *
     * @param integer $reqid
     * @return $this
     */
    public function setReqid($reqid)
    {
        $this->reqid = $reqid;

        return $this;
    }

    /**
     * Method to set the value of field requeriments
     *
     * @param string $requeriments
     * @return $this
     */
    public function setRequeriments($requeriments)
    {
        $this->requeriments = $requeriments;

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
     * Returns the value of field reqid
     *
     * @return integer
     */
    public function getReqid()
    {
        return $this->reqid;
    }

    /**
     * Returns the value of field requeriments
     *
     * @return string
     */
    public function getRequeriments()
    {
        return $this->requeriments;
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
        $this->setSource("cd_requeriments");
        $this->belongsTo('couid', '\CdCourse', 'couid', ['alias' => 'CdCourse']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_requeriments';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdRequeriments[]|CdRequeriments|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdRequeriments|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
