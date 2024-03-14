function openLoginContent() {
  document.getElementById("section-form__login").style.display = "block";
  document.getElementById("section-form__register").style.display = "none";
}

function openRegisterContent() {
  document.getElementById("section-form__register").style.display = "block";
  document.getElementById("section-form__login").style.display = "none";
}

function refreshMainIndex() {
  window.location.href = "index.php";
}

function returnMainIndex() {
  window.location.href = "../index.php";
}

function redirectToLoginPage() {
  window.location.href = "login/index.php";
}

function redirectToJsonPage() {
  window.location.href = "json-page/index.php";
}
