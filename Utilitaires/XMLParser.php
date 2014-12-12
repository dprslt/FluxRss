<?php

/**
 * Class XMLParser
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

class XMLParser {
    private $path;
    private $result;

    public function __construct($flux)
    {
        if(!($flux instanceof \metier\Flux)){
            throw new Exception("XMLParser construct : Flux Invalide");
        }
        $this->flux = $flux;
        $this -> path = $flux->getPath();
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

        $this->flux = new Flux($this->path);

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

    private $id;
    private $title;
    private $url;
    private $description;
    private $datePub;
    private $dateAjout;



    private function startElement($parser, $name, $attrs)
    {
        printf($name.' - <br/>');
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
       if($name == "ITEM")
       {
            $bd = new \utilitaires\PersistanceBD();

            return;
       }

        switch($name){
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


        //On doit concatener les data avant de les enregistrer.
        if($this->item != null){
            if($this->title){$this->item->setTitle($this->item->getTitle().$data);}
            if($this->link){$this->item->setLink($this->item->getLink().$data);}
            if($this->description){$this->item->setDescription($this->item->getDescription().$data);}
            if($this->date){$this->item->setPubDate($this->item->getPubDate().$data);}
        }
        else{
            if($this->title){$this->flux->setNom($data);}
            if($this->description){$this->flux->setDescription($this->flux->getDescription().$data);}
        }

    }
} 