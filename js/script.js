function redirectToLoginPage() {
  // Redirect to login/index.php
  document.addEventListener("DOMContentLoaded", function () {
    // Get the button element
    const loginButton = document.getElementById("loginButton");

    // Add click event listener to the button
    loginButton.addEventListener("click", redirectToLoginPage);
  });

  window.location.href = "login/index.php";
}

function redirectToJsonPage() {
  document.addEventListener("DOMContentLoaded", function () {
    // Get the button element
    const jsonButton = document.getElementById("jsonButton");

    // Add click event listener to the button
    jsonButton.addEventListener("click", redirectToLoginPage);
  });

  window.location.href = "json-page/index.php";
}
