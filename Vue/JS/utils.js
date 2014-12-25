
/**
 * Created by Theo on 25/12/2014.
 */

function getElementsByRegexId(regexpParam, tagParam) {
    // Si aucun nom de balise n'est spécifié, on cherche sur toutes les balises
    tagParam = (tagParam === undefined) ? '*' : tagParam;
    var elementsTable = [];
    for(var i=0 ; i<document.getElementsByTagName(tagParam).length ; i++) {
        if(document.getElementsByTagName(tagParam)[i].id && document.getElementsByTagName(tagParam)[i].id.match(regexpParam)) {
            elementsTable.push(document.getElementsByTagName(tagParam)[i]);
        }
    }
    return elementsTable;
}

function clickOnAllButton(){
    var result = getElementsByRegexId(/deroul.*/);
    console.log(result.length);
    result.forEach(function(item){
       item.click();
    });
}
