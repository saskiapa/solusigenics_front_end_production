console.log("watch");

const getVideoPlayURL = async (id, source) => {
  let response = await fetch(`http://127.0.0.1:5000/get_play_url_by_id/${id}?source=${source}`);

  let data = await response.text();
  return data;
}

const getSource = () => {
  let url = window.location.href;
  url = new URL(url);
  return url.searchParams.get("source");
}

const getDisease = () => {
  let url = window.location.href;
  url = new URL(url);
  return url.searchParams.get("disease");
}

const getTitle = () => {
  let url = window.location.href;
  url = new URL(url);
  return url.searchParams.get("title");
}

const getId = () => {
  let url = window.location.href;
  url = url.substring(url.indexOf('/tonton/')+8, url.length);
  url = url.substring(0, url.indexOf('?'));
  return url;
}

const initHeart = async (id) => {
  let response = await fetch(`http://127.0.0.1:8000/api/favorite/isUserFavoritedVideo?video_id=${id}`);
  let isUserFavoritedVideo = await response.text();
  console.log(isUserFavoritedVideo);
  if (isUserFavoritedVideo != 0) {
    heart.setAttribute("src", heart.getAttribute("src").replace("white", "red"));
  }
}

const initAside = () => {
  const disease = getDisease();
  const order = convertDiseaseToOrder(disease);
  document.getElementById(`btnDisease${order}`).classList.add("selected");
}

const init = async () => {
  const iframe = document.getElementById("iframe");
  const source = getSource();
  const id = getId();

  let playURL = await getVideoPlayURL(id, source);
  iframe.setAttribute("src", playURL);

  const title = getTitle();
  document.getElementById("videoTitle").innerHTML = title;
  document.title = title;

  await initHeart(id);
  initAside();
}

const heartToggle = () => {
  if (heart.getAttribute("src").includes("heart_white.png")) { // user memfavoritkan video
    heart.setAttribute("src", heart.getAttribute("src").replace("white", "red"));
    let id = getId();
    fetch(`http://127.0.0.1:8000/api/favorite/store?actualId=${id}&source=${getSource()}`, {
      method: "POST",
      body: JSON.stringify({
        actualId: id,
        source: getSource(),
        _token: getMeta("csrf-token"),
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
    });
    addAlertNotif("Berhasil menambahkan video ke favorit");
  }
  else { // user tidak memfavoritkan video
    heart.setAttribute("src", heart.getAttribute("src").replace("red", "white"));
    let id = getId();
    fetch(`http://127.0.0.1:8000/api/favorite/delete?video_id=${id}`, {
      method: "POST",
      body: JSON.stringify({
        actualId: id,
        source: getSource(),
        _token: getMeta("csrf-token"),
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
    });
    addAlertNotif("Berhasil menghapus video dari favorit");
  }
}

init();
document.getElementById("heart").addEventListener("click", heartToggle);