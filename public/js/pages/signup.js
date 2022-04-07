console.log("Halaman SignUp");
const form = document.getElementById("form");

async function validateForm(event) {
  event.preventDefault();
  const username = document.getElementById("inputUsername").value;
  const email = document.getElementById("inputEmail").value;
  let response = await fetch("/api/user/is_email_and_username_exist?username="+username+"&email="+email);
  let data = await response.text();
  data = await JSON.parse(data);
  // console.log(data);

  const smallUsername = document.getElementById("smallUsername");
  const smallEmail = document.getElementById("smallEmail");
  smallUsername.style.display = "none";
  smallEmail.style.display = "none";
  if (data["isUsernameExist"] == 0 && data["isEmailExist"] == 0) {
    form.submit();
  }
  else {
    if (data["isUsernameExist"] == 1) {
      smallUsername.style.display = "block";
    }
    if (data["isEmailExist"] == 1) {
      smallEmail.style.display = "block";
    }
  }
}

form.addEventListener("submit", validateForm);