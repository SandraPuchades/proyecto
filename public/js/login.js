document.addEventListener('DOMContentLoaded', function () {
    let moveLabel = document.querySelector('div');
    let login = document.getElementById('login');

    moveLabel.addEventListener('click', function () {
        let currentPosition = login.style.transform;
        if (currentPosition === 'rotateY(180deg)') {
            login.style.transform = 'rotateY(0)';
            login.style.display = 'block';
            loadPageContent('login')
        } else {
            login.style.transform = 'rotateY(180deg)';
            loadPageContent('registrar')
        }
    });


});
