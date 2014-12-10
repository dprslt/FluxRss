/**
 * Created by Theo on 10/12/2014.
 */
function hideHori($val){
    var item = document.getElementById($val);
    val.style.maxHeight = '0em';
}
function showHori($val){
    var item = document.getElementById($val);
    val.style.maxHeight = '99em';
}
function toogleHori($val){
    var item = document.getElementById($val);
    if(val.style.maxHeight = "0em")
        val.style.maxHeight = '99em';
    else
        val.style.maxHeight = '0em';
}