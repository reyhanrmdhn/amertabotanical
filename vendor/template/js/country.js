document.addEventListener("DOMContentLoaded", () => {
const xhttp = new XMLHttpRequest();
const select = document.getElementById("countries");
let countries;

xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    countries = JSON.parse(xhttp.responseText);
    assignValues();
    handleCountryChange();
  }
};
xhttp.open("GET", "https://restcountries.com/v3.1/all", true);
xhttp.send();

function assignValues() {
  countries.forEach(country => {
    const option = document.createElement("option");
    option.value = country.name.common;
    option.textContent = country.name.common;
    select.appendChild(option);
  });
}

function handleCountryChange() {
  const countryData = countries.find(
    country => select.value == country.name.common
  );
}

select.addEventListener("change", handleCountryChange.bind(this));
});