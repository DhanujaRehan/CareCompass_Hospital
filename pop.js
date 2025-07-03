const overlay = document.querySelector('.overlay');
const popup = document.querySelector('.popup');
const closeButton = document.getElementById('closePopup');

overlay.style.display = 'none';
popup.style.display = 'none';

function showPopup() {
    overlay.style.display = 'block';
    popup.style.display = 'block';
}

closeButton.addEventListener('click', () => {
    overlay.style.display = 'none';
    popup.style.display = 'none';
});
