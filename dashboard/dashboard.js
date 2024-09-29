document.addEventListener('DOMContentLoaded', function() {
    var contestRoute = document.getElementById('contest');
    contestRoute.addEventListener('click', function() {
        console.log('clicked');
        window.location.href = '../contestPage/contestPage.php';
    });
    var changeimg=document.getElementById('cngPhoto');
    changeimg.addEventListener('click',function(){
        console.log('clicked');
        var file=document.getElementById('file');
       file.click();
    });
});

