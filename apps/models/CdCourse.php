<?php
namespace Modules\Models;
class CdCourse extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $couid;

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
    protected $description;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $main_image;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $duration;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $visits;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $calification;

    /**
     *
     * @var double
     * @Column(type="double", nullable=true)
     */
    protected $price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $subid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $clieid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $summary;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $introduction_video;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $students;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $lenguage;

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
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field main_image
     *
     * @param string $main_image
     * @return $this
     */
    public function setMainImage($main_image)
    {
        $this->main_image = $main_image;

        return $this;
    }

    /**
     * Method to set the value of field duration
     *
     * @param string $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Method to set the value of field visits
     *
     * @param integer $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

        return $this;
    }

    /**
     * Method to set the value of field calification
     *
     * @param integer $calification
     * @return $this
     */
    public function setCalification($calification)
    {
        $this->calification = $calification;

        return $this;
    }

    /**
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

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
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field summary
     *
     * @param string $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Method to set the value of field introduction_video
     *
     * @param string $introduction_video
     * @return $this
     */
    public function setIntroductionVideo($introduction_video)
    {
        $this->introduction_video = $introduction_video;

        return $this;
    }

    /**
     * Method to set the value of field students
     *
     * @param integer $students
     * @return $this
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Method to set the value of field lenguage
     *
     * @param string $lenguage
     * @return $this
     */
    public function setLenguage($lenguage)
    {
        $this->lenguage = $lenguage;

        return $this;
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
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field main_image
     *
     * @return string
     */
    public function getMainImage()
    {
        return $this->main_image;
    }

    /**
     * Returns the value of field duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Returns the value of field calification
     *
     * @return integer
     */
    public function getCalification()
    {
        return $this->calification;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
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
     * Returns the value of field clieid
     *
     * @return integer
     */
    public function getClieid()
    {
        return $this->clieid;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Returns the value of field introduction_video
     *
     * @return string
     */
    public function getIntroductionVideo()
    {
        return $this->introduction_video;
    }

    /**
     * Returns the value of field students
     *
     * @return integer
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Returns the value of field lenguage
     *
     * @return string
     */
    public function getLenguage()
    {
        return $this->lenguage;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cd_umaevideos");
        $this->setSource("cd_course");
        $this->hasMany('couid', 'CdClientCourse', 'couid', ['alias' => 'CdClientCourse']);
        $this->hasMany('couid', 'CdCommentary', 'couid', ['alias' => 'CdCommentary']);
        $this->hasMany('couid', 'CdImages', 'couid', ['alias' => 'CdImages']);
        $this->hasMany('couid', 'CdLearning', 'couid', ['alias' => 'CdLearning']);
        $this->hasMany('couid', 'CdRequeriments', 'couid', ['alias' => 'CdRequeriments']);
        $this->hasMany('couid', 'CdTemary', 'couid', ['alias' => 'CdTemary']);
        $this->belongsTo('clieid', '\CdClient', 'clieid', ['alias' => 'CdClient']);
        $this->belongsTo('subid', '\CdSubcategory', 'subid', ['alias' => 'CdSubcategory']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_course';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCourse[]|CdCourse|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCourse|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
