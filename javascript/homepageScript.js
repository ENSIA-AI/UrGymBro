let slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
    showSlides(slideIndex += n);
}


function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function validateForm() {
    var email = document.getElementById("g-email").value;
    var message = document.getElementById("g-msg").value;
    var emailError = document.getElementById("emailError");
    var messageError = document.getElementById("messageError");

    var emailPattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!emailPattern.test(email)) {
        emailError.innerHTML = "Please enter a valid email address.";
        return false;
    } else {
        emailError.innerHTML = "";
    }

    if (message.trim() === "") {
        messageError.innerHTML = "Please enter a message.";
        return false;
    } else {
        messageError.innerHTML = "";
    }


    var newWindow = window.open('', '_blank');
    newWindow.alert("Form submitted successfully!");

    document.getElementById("contactForm").reset();
    return false;
}


function scrollToNextSection() {
    const nextSection = document.getElementById('ourServicesSection');

    const offset = nextSection.offsetTop - 80;

    window.scroll({
        top: offset,
        behavior: 'smooth'
    });
}



  function typeWriter(text, element, delay) {
    let i = 0;
    const speed = 50; // Adjust the speed of typing

    function type() {
      if (i < text.length) {
        if (text.substring(i, i + 4) === '<BR>') {
          // If it's a line break tag, add a line break
          element.innerHTML += '<br>';
          i += 4; // Move the index past the line break tag
        } else {
          element.innerHTML += text.charAt(i).toUpperCase();
          i++;
        }
        setTimeout(type, speed);
      }
    }

    setTimeout(type, delay);
  }

  const sloganElement = document.querySelector('.slogan p');
  const textToType = 'YOUR GUIDE TO <BR>A HEALTHY LIFESTYLE';

  // Clear the content of the slogan element
  sloganElement.innerHTML = '';

  typeWriter(textToType, sloganElement, 0);

