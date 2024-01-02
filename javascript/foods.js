document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.toggleButton');
    var detailsList = document.querySelectorAll('.details');

    buttons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            var details = detailsList[index];
            if (details.style.display === 'none' || details.style.display === '') {
                details.style.display = 'flex';
                button.innerHTML = 'Hide Details';
            } else {
                details.style.display = 'none';
                button.innerHTML = 'Show Details';
            }
        });
    });
});
