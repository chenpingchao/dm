window.onload = function(){
    var login = document.getElementsByClassName('login')[0];
    //可见高度
    var wh = document.documentElement.clientHeight;
    var ww = document.documentElement.clientWidth;
    //元素高度
    var lw = login.offsetWidth;
    var lh = login.offsetHeight;

    login.style.left = (ww-lw)/2 + 'px';
    login.style.top = (wh-lh)/2 + 'px';

};