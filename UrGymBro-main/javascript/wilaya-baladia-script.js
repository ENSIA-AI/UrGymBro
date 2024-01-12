document.addEventListener("DOMContentLoaded", function () {
    const firstDropDown = document.getElementById('wilaya');
    const secondDropDown = document.getElementById('baladiya');

    fetch("https://raw.githubusercontent.com/AbderrahmeneDZ/Wilaya-Of-Algeria/master/Wilaya_Of_Algeria.json")
        .then((response) => response.json())
        .then((states) => {
            states.forEach((state) => {
                const option = document.createElement("option");
                option.value = state.id;  // Update this line if 'id' is not the correct property in your JSON data
                option.text = state.name;
                firstDropDown.appendChild(option);
            });
        });

    fetch("https://raw.githubusercontent.com/AbderrahmeneDZ/Wilaya-Of-Algeria/master/Commune_Of_Algeria.json")
        .then((response) => response.json())
        .then((towns) => {
            firstDropDown.addEventListener("change", () => {
                const selectedState = firstDropDown.value;
                const townForState = towns.filter(
                    (town) => town.wilaya_id === selectedState
                );

                secondDropDown.innerHTML = "";
                townForState.forEach((town) => {
                    const option = document.createElement("option");
                    option.value = town.id;
                    option.text = town.name;
                    secondDropDown.appendChild(option);
                });
            });
        });
});
