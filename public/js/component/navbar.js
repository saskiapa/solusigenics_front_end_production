const navbar = document.getElementById("navbar");
const dropdownMenu = document.getElementById("dropdown-menu");
const threeDots = document.getElementById("three-dots");

threeDots.addEventListener("mouseenter", () => {
  dropdownMenu.style.display = "block";
});

navbar.addEventListener("mouseleave", () => {
  dropdownMenu.style.display = "none";
});

async function displayUsername() {
  // Fungsi ini digunakan untuk mendapatkan username dan menampilkannya

  let response = await fetch('http://127.0.0.1:8000/api/user/current_username');

    // console.log(response.status);
    // console.log(response.statusText);
    
    if (response.status === 200) {
        let username = await response.text();
        const welcomeGreeting = document.getElementById("welcomeGreeting");
        welcomeGreeting.innerHTML = `Welcome, ${username}`;
    }
}

displayUsername();