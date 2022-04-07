const alertConteiner = document.getElementById("alert-container");
const alertConteinerMessage = document.getElementById("alert-container-message");

const displayalertContainer = (message) => {
  alertConteinerMessage.innerHTML = message;
  alertConteiner.style.display = "flex";
};

const hidealertContainer = () => {
  alertConteiner.style.display = "none";
};