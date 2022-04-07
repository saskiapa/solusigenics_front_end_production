console.log("Halaman Login");
const form = document.getElementById("form");

function setupAlert() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  const willAlertShow = urlParams.get('alert');
  console.log(willAlertShow);
  if (willAlertShow == "true") {
    const alert = document.getElementById("alert");
    if (urlParams.get('type') == 'danger') {
      alert.style.backgroundColor = "#f7d7da";
    }
    else if (urlParams.get('type') == 'success') {
      alert.style.backgroundColor = "#d4edda";
    }
    const alertMessage = document.getElementById("alertMessage");
    if (urlParams.get('info') == 'NF') {
      alertMessage.innerHTML = "Username atau Email atau Password salah";

      const inputUsername = document.getElementById("inputUsername");
      inputUsername.value = urlParams.get('username');
    }
    else if (urlParams.get('info') == 'RS') {
      alertMessage.innerHTML = "Pendaftaran berhasil. Silakan login";
    }
    alert.style.display = "block";
  }
}

async function validateForm(event) {
  event.preventDefault();
  const username = document.getElementById("inputUsername").value;
  const password = document.getElementById("inputPassword").value;
  let response = await fetch("/api/user/check_login?emailorusername="+username+"&password="+password);
  let data = await response.text();
  if (data == "NF") {  // jika user tidak ditemukan
    window.location.href = `/login?alert=true&username=${username}&type=danger&info=NF`;
  }
  else {  // jika user ditemukan
    window.location.href = "/beranda";
  }
}

form.addEventListener("submit", validateForm);
setupAlert();