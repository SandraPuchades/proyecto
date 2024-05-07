function scrollBottom(){
    const div = document.getElementById('foro');
    div.scrollTop = div.scrollHeight;
}

window.onload = function() {
    scrollBottom();
};
