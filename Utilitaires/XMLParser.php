<?php

/**
 * Class XMLParser
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

namespace utilitaires;

use DateTime;
use Exception;
use metier\Flux;

class XMLParser {
    private $path;
    private $result;

    public function __construct($flux)
    {
        if(!($flux instanceof Flux)){
            throw new Exception("XMLParser construct : Flux Invalide");
        }
        var_dump($flux);
        $this->flux = $flux;
        $this -> path = $flux->getPath();
        echo $this->path.'<br/>';
    }

    public function getResult() {
        return $this->result;
    }

    private $flux;

    public function getFlux(){
        return $this->flux;
    }

    /**
     * Parse le fichier et met le resultat dans Result
     */
    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }



        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        $this -> result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    private $item ;

    private $b_title = false;
    private $b_url = false;
    private $b_link = false;
    private $b_description = false;
    private $b_guid = false;
    private $b_date = false;

    private $b_item = false;
    private $b_image = false;

    private $id = 0;
    private $title;
    private $url;
    private $guid;
    private $description;
    private $datePub;
    private $dateAjout;


    private $link;
    private $img_link;
    private $img_url;
    private $img_title;



    private function startElement($parser, $name, $attrs)
    {
        switch($name){
            case "TITLE":
                $this->b_title = true;
                break;
            case "ITEM":
                $this->b_item = true;
                break;
            case "IMAGE":
                $this->b_image = true;
                break;
            case "URL":
                $this->b_url = true;
                break;
            case "DESCRIPTION":
                $this->b_description = true;
                break;
            case "GUID":
                $this->b_guid = true;
                break;
            case "LINK" :
                $this->b_link = true;
                break;
            case "PUBDATE":
                $this->b_date = true;
                break;
        }
    }


    private function endElement($parser, $name)
    {
        switch($name){
            case "ITEM":
                $bd = new \utilitaires\PersistanceBD();
                $bd->ajouterNews(new \metier\News(0,$this->flux->getId(),$this->title,$this->link,$this->guid,$this->description,$this->datePub,date('Y-m-d H:i:s')));
                unset($this->description,$this->title,$this->link,$this->guid,$this->datePub,$this->dateAjout);
                $this->b_item = false;
                return;
            case "IMAGE":
                $this->flux->setImageLink($this->img_link);
                $this->flux->setImageTitre($this->img_title);
                $this->flux->setImageUrl($this->img_url);
                unset($this->img_title,$this->img_link,$this->img_url);
                $this->b_image = false;
                return;
            case "TITLE":
                $this->b_title = false;
                break;
            case "IMAGE":
                $this->b_image = false;
                break;
            case "URL":
                $this->b_url = false;
                break;
            case "DESCRIPTION":
                $this->b_description = false;
                break;
            case "GUID":
                $this->b_guid = false;
                break;
            case "LINK" :
                $this->b_link = false;
                break;
            case "PUBDATE":
                $this->b_date = false;
                break;
        }

    }

    private function characterData($parser, $data)
    {
        if($this->b_item){
            if($this->b_title) $this->title = $this->title.$data;
            if($this->b_description) $this->description =  $this->description.$data;
            if($this->b_link) $this->link = $this->link.$data;
            if($this->b_guid) $this->guid = $this->guid.$data;
            if($this->b_date) $this->datePub = $this->datePub.$data;
        }
        elseif($this->b_image){
            if($this->b_url) $this->img_url = $this->img_url.$data;
        }
        else{

        }

    }
}