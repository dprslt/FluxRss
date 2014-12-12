<?php

namespace metier;

class Flux {
    private $id;
    private $title;
    private $path;
    private $link;
    private $description;

    private $image_url;
    private $image_titre;
    private $image_link;

    private $news;

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param mixed $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $image_link
     */
    public function setImageLink($image_link)
    {
        $this->image_link = $image_link;
    }

    /**
     * @param mixed $image_titre
     */
    public function setImageTitre($image_titre)
    {
        $this->image_titre = $image_titre;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->image_link;
    }

    /**
     * @return mixed
     */
    public function getImageTitre()
    {
        return $this->image_titre;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function __construct($id,$title,$path,$link,$description,$image_url,$image_titre,$image_link){
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->image_titre = $image_titre;
        $this->image_link = $image_link;
    }


} 