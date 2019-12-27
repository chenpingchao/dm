window.onload = function(){
    function random(num1,num2) {
        return Math.floor(Math.random()*(num2-num1+1))+num1;
    }

    var lis = document.getElementsByTagName('li');
    for(var i=0;i<lis.length;i++){
        color = 'rgb('+random(100,255)+','+random(100,255)+','+random(100,255)+')';
        lis[i].style.background = color;
    }
};