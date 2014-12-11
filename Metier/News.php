<?php


class News {

    private $id;
    private $title;
    private $url;
    private $description;
    private $datePub;
    private $dateAjout;

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


    public static function newNews($id,$flux,$title,$description,$url,$datePub = "",$dateAjout = "today"){
        if($dateAjout == "today")
            $dateAjout = date("H:i d m Y");
        $ne = new News($id,$title,$description,$flux);
        $ne->setUrl($url);
    }

    public function __construct($id,$title,$description,$flux){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        if(!($flux instanceof Flux)){
            throw new Exception("Flux invalide !");
        }
        $this->flux = $flux;
    }

} 