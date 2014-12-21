/**
 * Created by Theo on 10/12/2014.
 */
function hideHori($val){
    var item = document.getElementById($val);
    item.style.maxHeight = '0em';
}
function showHori($val){
    var item = document.getElementById($val);
    item.style.maxHeight = '99em';
}
function toogleHori($val){
    var item = document.getElementById($val);
    if(item.style.maxHeight == "0em")
        item.style.maxHeight = '99em';
    else
        item.style.maxHeight = '0em';
}