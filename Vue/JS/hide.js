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
function toogleNews($val,$img){
    var img = document.getElementById($img);
    var item = document.getElementById($val);
    if(item.style.maxHeight == "0em"){
        item.style.maxHeight = '99em';
        img.style.transform = 'rotate(180deg)';
    }
    else {
        item.style.maxHeight = '0em';
        img.style.transform = 'rotate(0deg)';
    }
}

function showNews($val,$img){
    var img = document.getElementById($img);
    var item = document.getElementById($val);
        item.style.maxHeight = '99em';
        img.style.transform = 'rotate(180deg)';
}

function hideNews($val,$img){
    var img = document.getElementById($img);
    var item = document.getElementById($val);
    item.style.maxHeight = '0em';
    img.style.transform = 'rotate(0deg)';
}