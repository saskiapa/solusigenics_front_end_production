function asideButtonOnClickListener(query, order) {
  // Fungsi ini digunakan untuk memfungsikan tombol pada aside

  // removeAllVideo();
  // const buttons = document.getElementsByClassName("btnDisease");
  // for (let i = 0; i < buttons.length; i++) {  // Menghapus kelas selected pada semua button
  //   buttons[i].classList.remove("selected");
  // }
  // document.getElementById("btnDisease"+order).classList.add("selected");  // Menambah kelas selected pada button yang dipilih

  // getVideoByDisease(query);
  // document.getElementById("videoNone").style.display = "none";
	window.location.href = `http://127.0.0.1:8000/beranda?disease=${query}&order=${order}`;
}
