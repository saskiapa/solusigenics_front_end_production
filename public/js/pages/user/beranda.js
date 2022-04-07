console.log("beranda");

const form = document.getElementById("form");
const videoNone = document.getElementById("videoNone");

const displayForm = () => {
  form.style.display = "flex";
};

const hideForm = () => {
  form.style.display = "none";
};

const displayVideoNone = () => {
  videoNone.style.display = "flex";
};

const hideVideoNone = () => {
  videoNone.style.display = "none";
};

const videoList = document.getElementById("videoList");

async function getVideoByDisease(disease) {
  // Fungsi ini digunakan untuk mendapatkan video dan menampilkan video

  displayForm();
  displayLoadingScreen();
  let response = await fetch('http://127.0.0.1:5000/get_video_by_disease?query='+disease);
  document.getElementById("inputDisease").value = disease;

  // console.log(response.status);
  // console.log(response.statusText);
  
  if (response.status === 200) {
      let data = await response.text();
      data = JSON.parse(data);
      
      // handle data
      const template = document.getElementById("videoTemplate");

      hideLoadingScreen();
      const videos = data["videos"];
      videos.forEach(video => {
        console.log(video);
        const title = video["title"];
        const thumbnail = video["thumbnail"];
        const v_id = video["id"];
        const v_source = video["source"];

        var clone = template.content.cloneNode(true);
        const a = clone.querySelector(".anchor");
        const img = clone.querySelector("img");
        const figcaption = clone.querySelector("figcaption");
        const source = clone.querySelector(".source");
        const video_id = clone.querySelector(".video_id");

        a.href = `/tonton/${v_id}?source=${v_source}&title=${title}&disease=${disease}`;
        img.setAttribute("src", thumbnail);
        figcaption.innerHTML = title;
        source.innerHTML = v_source;
        video_id.innerHTML = v_id;
        videoList.append(clone);
      });
  }
}

function removeAllVideo() {
  // Fungsi ini digunakan untuk menghapus semua video dari DOM
  while (videoList.childElementCount > 3) {
    videoList.removeChild(videoList.lastElementChild);
  }
}

const displayRecommendationVideo = async () => {
  const disease = getURLParameter("disease");
  if (disease == null) {
    console.log("Akan merekomendasikan video");
    let response = await fetch('http://127.0.0.1:8000/api/favorite');
    let user_favorite_videos = await response.text();
    user_favorite_videos = JSON.parse(user_favorite_videos);
    
    if (user_favorite_videos.length != 0) {
      displayLoadingScreen();
      hideVideoNone();
      let headers = new Headers();
      headers.append("Content-Type", "application/json");
      const raw = JSON.stringify(user_favorite_videos);
      const requestOptions = {
        method: 'POST',
        headers: headers,
        body: raw,
        redirect: 'follow'
      };
      response = await fetch(`http://127.0.0.1:5000/get_video_recommendation`, requestOptions);
      let videos_detail = await response.text();
      videos_detail = JSON.parse(videos_detail);
      videos_detail = videos_detail["videos"];
      console.log(videos_detail);
      if (videos_detail.length == 0) {
        displayVideoNone();
        hideLoadingScreen();
      }
      else {
        hideVideoNone();
        hideLoadingScreen();
        const template = document.getElementById("videoTemplate");
        videos_detail.forEach(video => {
          console.log(video);
          const title = video["title"];
          const thumbnail = video["thumbnail"];
          const v_id = video["id"];
          const v_source = video["source"];
  
          var clone = template.content.cloneNode(true);
          const a = clone.querySelector(".anchor");
          const img = clone.querySelector("img");
          const figcaption = clone.querySelector("figcaption");
          const source = clone.querySelector(".source");
          const video_id = clone.querySelector(".video_id");
  
          a.href = `/tonton/${v_id}?source=${v_source}&title=${title}&disease=${disease}`;
          img.setAttribute("src", thumbnail);
          figcaption.innerHTML = title;
          source.innerHTML = v_source;
          video_id.innerHTML = v_id;
          videoList.append(clone);
        });
      }
    }
  }
}

const displaySelectedDiseaseVideo = () => {
  const disease = getURLParameter("disease");
  if (disease != null) {
    document.getElementById("videoNone").style.display = "none";
    getVideoByDisease(disease);
    document.getElementById(`btnDisease${getURLParameter("order")}`).classList.add("selected");
  }
};

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  const keyword = document.getElementById("inputKeyword").value;
  const disease = document.getElementById("inputDisease").value;
  
  displayLoadingScreen();
  removeAllVideo();
  hidealertContainer();
  let response = await fetch(`http://localhost:5000/search/${disease}/${keyword}`);
  if (response.status == 200) {
    let data = await response.text();
    data = JSON.parse(data);
    const videos = data["videos"];
    const template = document.getElementById("videoTemplate");

    if (videos.length == 0) {  // jika tidak ada video yang sesuai dengan keyword
      displayalertContainer(`Tidak ada video yang cocok dengan keyword ${keyword}`);
    }

    hideLoadingScreen();
    videos.forEach(video => {
      console.log(video);
      const title = video["title"];
      const thumbnail = video["thumbnail"];
      const v_id = video["id"];
      const v_source = video["source"];

      var clone = template.content.cloneNode(true);
      const a = clone.querySelector(".anchor");
      const img = clone.querySelector("img");
      const figcaption = clone.querySelector("figcaption");
      const source = clone.querySelector(".source");
      const video_id = clone.querySelector(".video_id");

      a.href = `/tonton/${v_id}?source=${v_source}&title=${title}&disease=${disease}`;
      img.setAttribute("src", thumbnail);
      figcaption.innerHTML = title;
      source.innerHTML = v_source;
      video_id.innerHTML = v_id;
      videoList.append(clone);
    });
  }
});

const init = () => {
  hideForm();
  hideLoadingScreen();
  displayRecommendationVideo();
  displaySelectedDiseaseVideo();
}

init();