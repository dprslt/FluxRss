<?php

namespace metier;

class News {

    private $id;
    private $title;
    private $url;
    private $description;
    private $datePub;
    private $dateAjout;
    private $guid;

    /**
     * @return mixed
     */
    public function getGuid()
    {
        return $this->guid;
    }


    private $flux;

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @return mixed
     */
    public function getDatePub()
    {
        return $this->datePub;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getFlux()
    {
        return $this->flux;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * @param mixed $url
     */
    protected function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $dateAjout
     */
    protected function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @param mixed $datePub
     */
    protected function setDatePub($datePub)
    {
        $this->datePub = $datePub;
    }


    public function __construct($id,$flux,$title,$url,$guid,$description,$datePub = ""){
        $this->id = $id;
        $this->flux = $flux;
        $this->title = $title;
        $this->url = $url;
        $this->guid = $guid;
        $this->description = $description;

        $this->setDatePub($datePub);
    }

} 