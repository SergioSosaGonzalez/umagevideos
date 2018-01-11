<?php
namespace Modules\Models;
class CdVideos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $vidid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $video;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $sutemid;

    /**
     * Method to set the value of field vidid
     *
     * @param integer $vidid
     * @return $this
     */
    public function setVidid($vidid)
    {
        $this->vidid = $vidid;

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
     * Method to set the value of field video
     *
     * @param string $video
     * @return $this
     */
    public function setVideo($video)
    {
        $this->video = $video;

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
     * Returns the value of field vidid
     *
     * @return integer
     */
    public function getVidid()
    {
        return $this->vidid;
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
     * Returns the value of field video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
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
        $this->setSource("cd_videos");
        $this->belongsTo('sutemid', '\CdSubtemary', 'sutemid', ['alias' => 'CdSubtemary']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_videos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdVideos[]|CdVideos|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdVideos|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
