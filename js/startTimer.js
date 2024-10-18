function startTimer(){
    let shc = new Date();
    var h=shc.getHours();
    var m=shc.getMinutes();
    var s= shc.getSeconds();

    var  d = shc.getDate();
    var mn= shc.getMonth();
    var y= shc.getFullYear();

    h=addZero(h);
    m=addZero(m);
    s=addZero(s);
    
    document.getElementById('tmr').innerHTML= h+':'+ m +':'+ s ;

    t=setTimeout('startTimer()', 500);
}

function addZero(z){
    if(z<10){
        z="0" + z; 
    }
    return z;
}