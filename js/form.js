"use strict";
const form = document.querySelector("#contact-form");
const url = "https://volonteer-cars.onrender.com/api/feedback"; // замінити на актуальний
form.addEventListener("submit", function (event) {
  event.preventDefault();

  const name = form.querySelector("#contact__name").value;
  const phone = form.querySelector("#contact__tel").value;
  const email = form.querySelector("#contact__email").value;

  const data = { name, phone, email };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((responseData) => {
      console.log(responseData);
    })
    .catch((error) => {
      console.log(error);
    });
  form.reset();
});
