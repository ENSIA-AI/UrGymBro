document.addEventListener("DOMContentLoaded", function () {
    var descriptions = document.querySelectorAll('.product .product_description');

    descriptions.forEach(function (description) {
        var text = description.textContent.trim();
        var maxLength = 120;

        if (text.length > maxLength) {
            var truncatedText = text.substring(0, maxLength);
            var lastSpaceIndex = truncatedText.lastIndexOf(' ');

            if (lastSpaceIndex !== -1) {
                truncatedText = truncatedText.substring(0, lastSpaceIndex);
            }

            description.textContent = truncatedText + '...';
            description.classList.add('truncate');
        }
    });
});
