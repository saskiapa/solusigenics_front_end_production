console.log("favorite");

const getVideosDetail = async (body) => {
  var headers = new Headers();
  headers.append("Content-Type", "application/json");
  const raw = JSON.stringify(body);
  const requestOptions = {
    method: 'POST',
    headers: headers,
    body: raw,
    redirect: 'follow'
  };
  response = await fetch(`http://127.0.0.1:5000/get_videos_detail`, requestOptions);
  let videos_detail = await response.text();
  videos_detail = JSON.parse(videos_detail);
  return videos_detail;
}

const deleteFavorite = (id) => {
  const willDelete = confirm('Apakah anda yakin ingin menghapus video dari favorit?');
  if (willDelete) {
    fetch(`http://127.0.0.1:8000/api/favorite/delete?actualId=${id}`, {
      method: "POST",
      body: JSON.stringify({
        actualId: id,
        _token: getMeta("csrf-token"),
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
    });
  }
  window.location.reload();
};

const getFavorite = async () => {
  let response = await fetch('http://127.0.0.1:8000/api/favorite');
  let data = await response.text();
  let videos = JSON.parse(data);

  if (videos.length == 0) {  // jika tidak ada favorit
    displayalertContainer("Anda belum mepunyai video favorit");
  }
  else {
    const bodyData = [];

    for (let i=0; i < videos.length; i++) {
      bodyData.push({
        id: videos[i]["id"],
        source: videos[i]["source"],
      });
    }

    videos = await getVideosDetail(bodyData);
    videos = videos.videos

    const videoList = document.getElementById("video-list");
    const template = document.getElementById("videoTemplate");

    for (let i = 0; i < videos.length; i++) {
      video = videos[i];
      console.log(video);
      const v_id = video["id"]
      const v_source = video["source"]
      const v_title = video["title"];
      const v_disease = video["disease"];
      const v_thumbnail = video["thumbnail"];

      var clone = template.content.cloneNode(true);
      const a1 = clone.querySelector("a");
      const a2 = clone.querySelector(".title-anchor");
      const p = clone.querySelector("p");
      const thumbnail = clone.querySelector("img");
      const trash_bin = clone.querySelector(".trash-icon");

      a1.setAttribute("href", `/tonton/${v_id}?source=${v_source}&title=${v_title}&disease=${v_disease}`);
      a2.setAttribute("href", `/tonton/${v_id}?source=${v_source}&title=${v_title}&disease=${v_disease}`);
      p.innerHTML = `${v_title}`;
      thumbnail.setAttribute("src", v_thumbnail);
      trash_bin.setAttribute("onclick", `deleteFavorite('${v_id}')`);
      videoList.append(clone);
    }
  }
  hideLoadingScreen();
}

const init = () => {
  displayLoadingScreen();
  getFavorite();
}

init();
