const alertNotifContainer = document.getElementById("alert-notif-container");
const templateAlertNotif = document.getElementById("alert-notif-template");

const removeFirstAlertNotif = () => {  // Fungsi untuk menghapus alert notif pertama
  const elements = alertNotifContainer.getElementsByTagName('div'); // Mendapatkan semua alert notif
  alertNotifContainer.removeChild(elements[0]); // Menghapus alert notif pertama
};

const addAlertNotif = async (message) => {  // Fungsi untuk menambahkan alert notif
  const clone = templateAlertNotif.content.cloneNode(true);  // Clone template
  const id = `alert-notif-${Math.round((new Date()).getTime() / 1000)}`;  // Membuat id alert notif
  let alertNotif = clone.querySelector(".alert-notif");  // Bind alert notif dari clone
  alertNotif.setAttribute("id", id);  // Memasang id di alert notif
  alertNotif.innerHTML = message;  // Menambahkan pesan di alert notif

  alertNotifContainer.appendChild(alertNotif);  // Menambah alert notif ke DOM
  await sleep(3000);
  alertNotif = document.getElementById(id);
  alertNotif.classList.add("alert-notif-hide");
  await sleep(300);
  removeFirstAlertNotif();
};