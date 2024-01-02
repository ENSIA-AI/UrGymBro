document.addEventListener('DOMContentLoaded', function () {
    const lyes = document.getElementById('Lyes');
    const maya = document.getElementById('Maya');
    const iheb = document.getElementById('Iheb');
    const maissa = document.getElementById('Maissa');
  
    const leftArrow = document.getElementById('left-arrow-container');
    const rightArrow = document.getElementById('right-arrow-container');
  
    const profiles = [lyes, maya, iheb, maissa];
  
    let currentProfileIndex = 0;
  
    function showProfile(index) {
      profiles.forEach(profile => profile.style.display = 'none');
      profiles[index].style.display = 'flex';
    }
  
    function nextProfile() {
      currentProfileIndex = (currentProfileIndex + 1) % profiles.length;
      showProfile(currentProfileIndex);
    }
  
    function prevProfile() {
      currentProfileIndex = (currentProfileIndex - 1 + profiles.length) % profiles.length;
      showProfile(currentProfileIndex);
    }
  
    leftArrow.addEventListener('click', prevProfile);
    rightArrow.addEventListener('click', nextProfile);
  
    showProfile(currentProfileIndex);
  });
  
