<?php

function close_tag_html($text) {
    preg_match_all("/<[^>]*>/", $text, $bal);
    $liste = array();
    foreach($bal[0] as $balise) {
        if ($balise{1} != "/") { // opening tag
            preg_match("/<([a-z]+[0-9]*)/i", $balise, $type);
            // add the tag
            $liste[] = $type[1];
              } else { // closing tag
            preg_match("/<\/([a-z]+[0-9]*)/i", $balise, $type);
            // strip tag
            for ($i=count($liste)-1; $i>=0; $i--){
                if ($liste[$i] == $type[1])
                                               $liste[$i] = "";
                               }
        }
    }
    $tags = '';
    for ($i=count($liste)-1; $i>=0; $i--){
        if ($liste[$i] != "" && $liste[$i] != "br") $tags .= '</'.$liste[$i].'>';
    }
    return($text.$tags);
}

    $result = close_tag_html("<div><font>ylllo");
    var_dump($result);

    echo htmlentities(close_tag_html("<div><font>ylllo"));
?>
