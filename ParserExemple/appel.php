<html>
<body>
<?php


include ('XmlParserExample1.php');
include ($path.'RSSParser/XMLParser.php');
include ($path.'Metier/News.php');
include ($path.'Metier/Flux.php');



echo 'Parser php <br/>';
echo $path;
         
//$parser = new XmlParserExample1(dirname(__FILE__).'/rss.xml');
$parser = new XMLParser($path.'ParserExemple/rss.xml');
$parser ->parse();
$result = $parser ->getFlux();
if($result == null){
    echo 'fuckkk!!';
}
echo $result->getNews()[0]->getLink();
var_dump($result);
 
?>
</body>
</html>
