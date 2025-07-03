let menubar = document.querySelector('#menu-bars');
let navbar = document.querySelector('.nav-links');

menubar.onclick = () => {
    menubar.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

document.querySelectorAll('.ph').forEach(function(element) {
    element.addEventListener('mouseover', function() {
        this.querySelector('i').classList.remove('fa-phone-alt');
        this.querySelector('i').classList.add('fa-phone-volume');
    });
    element.addEventListener('mouseout', function() {
        this.querySelector('i').classList.remove('fa-phone-volume');
        this.querySelector('i').classList.add('fa-phone-alt');
    });
});

document.querySelectorAll('.letter').forEach(function(element) {

    element.addEventListener('mouseover',function(){
        this.querySelector('i').classList.remove('fa-envelope');
        this.querySelector('i').classList.add('fa-envelope-open');
    });
    element.addEventListener('mouseout', function() {
        this.querySelector('i').classList.remove('fa-envelope-open');
        this.querySelector('i').classList.add('fa-envelope');
    });


});
  
