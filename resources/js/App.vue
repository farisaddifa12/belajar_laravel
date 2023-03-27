<template>

  <div class="container py-4">
    <header class="pb-4 mb-5 border-bottom">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg> -->
        <img src="../../public/assets/imgs/logo.png" alt="bootstrap-logo" width="150" height="75" class="me-2">
        <span class="fs-4"></span>
      </a>
    </header>

    <div id="clock-container">
  <div id="clock"></div>
  <div id="date-dropdown">
    <div id="date"></div>
  </div>
</div>


    <div class="" id="myDiv">
      <!-- <div class="container-fluid py-5"> -->
        <h1 class="display-5 fw-bold">Bagaimana Pelayanan Kami?</h1>
      <!-- </div> -->
    </div>


    <div class="row align-items-md-stretch">
      <div class="col-md-4" id="card">
        <div>
          <h2>Puas</h2>
  <img @click="survey(1)" src="../../public/assets/imgs/happy.gif">
        </div>
      </div>
      <div class="col-md-4" id="card">
        <div>
          <h2>Cukup Puas</h2>
          <img @click="survey(2)" src="../../public/assets/imgs/cukup.gif">
        </div>
      </div>
      <div class="col-md-4" id="card">
        <div>
          <h2>Tidak Puas</h2>
          <img @click="survey(0)" src="../../public/assets/imgs/sad.gif">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Swal from 'sweetalert2/dist/sweetalert2.js'
  import 'sweetalert2/dist/sweetalert2.css'
  import axios from 'axios';

  export default {
    mounted() {
      const clockDiv = document.getElementById('clock');
      const dateDropdown = document.getElementById('date-dropdown');

      // Fungsi untuk menampilkan waktu saat ini
      function showTime() {
        let date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        let amOrPm = hours >= 12 ? "PM" : "AM";

        // Mengonversi format jam ke 12 jam
        hours = hours % 12 || 12;
        // Menambahkan nol di depan angka jika kurang dari 10
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        // Mengatur teks pada elemen HTML yang menampilkan waktu saat ini
        document.getElementById("clock").innerHTML =
          hours + ":" + minutes + ":" + seconds + " " + amOrPm;

        document.getElementById("date").innerHTML = date.toDateString();
      }

      // Memanggil fungsi showTime setiap 1 detik
      setInterval(showTime, 1000);

      clockDiv.addEventListener('mouseover', () => {
        dateDropdown.style.display = 'block';
      });

      clockDiv.addEventListener('mouseout', () => {
        dateDropdown.style.display = 'none';
      });

      // Fungsi untuk menampilkan informasi tanggal pada saat cursor diarahkan pada div
      let clock = document.getElementById("clock");
      let infoDiv = document.createElement("div");
      let currentDate = new Date().toDateString();

      // Mengatur teks pada elemen HTML yang menampilkan informasi tanggal
      infoDiv.innerHTML = currentDate;

      clock.addEventListener("mouseover", function () {
        // Menambahkan class untuk menampilkan elemen HTML
        infoDiv.classList.add("show-date");

        // Mengatur posisi elemen HTML yang menampilkan informasi tanggal
        let rect = clock.getBoundingClientRect();
        let leftPosition = rect.left - infoDiv.offsetWidth - 20; // 20 adalah jarak antara elemen HTML yang menampilkan informasi tanggal dengan div
        let topPosition = rect.top;
        infoDiv.style.left = leftPosition + "px";
        infoDiv.style.top = topPosition + "px";
        document.body.appendChild(infoDiv);
      });

      clock.addEventListener("mouseout", function () {
        // Menghapus elemen HTML yang menampilkan informasi tanggal
        infoDiv.remove();
      });
    },

    methods: {
      survey: function (status) {
        let message = "";

        if (status === 2) {
          message = "<h1>Pesan Terkirim!</h1><h5>Terima kasih, kami senang bisa melayani Anda dengan baik!</h5>";
        } else if (status === 1) {
          message = "<h1>Pesan Terkirim!</h1><h5>Terima kasih atas masukan Anda.</h5>";
        } else {
          message =
            "<h1>Pesan Terkirim!</h1><h5>Maaf atas ketidaknyamanannya, kami akan memperbaiki layanan kami sebaik mungkin.</h5>";
        }

        Swal.fire({
          title: message,
          icon: "success",
          timer: 3000,
          customClass: {
          popup: "my-alert-class",
          },
          showConfirmButton: false,
        });
      },
    },
  };
</script>



<style>
  #myDiv {
/* background-image: url('../../public/assets/imgs/rumkit.png');
background-size:auto;  */
/* box-shadow: 0px 5px 50px 0px rgba(7, 7, 7, 0.436); */
color: rgb(32, 113, 51);
font-family: 'Montserrat', sans-serif;
text-align: center;
margin-bottom: 50px;
}

#appli {
background-color: rgb(255, 255, 255);
}

#card {
  box-sizing: border-box;
  width: 350px;
  height: 300px;
  font-family: 'Montserrat', sans-serif;
  background: rgba(217, 217, 217, 0.58);
  border: 1px solid white;
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
  backdrop-filter: blur(6px);
  border-radius: 17px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  user-select: none;
  font-weight: bolder;
}

#card:hover {
  border: 1px solid rgba(217, 217, 217, 0.58);
  transform: scale(1.05);
}

#card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}

#clock {
    position: fixed;
    top: 35px;
    right: 35px;
    font-size: 20px;
    font-family: 'Montserrat', sans-serif;
    color: #78331e;
    text-align: center;
    width: 100px;
    height: 66px;
    background: rgba(217, 217, 217, 0.58);
    border: 1px solid white;
    box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
    backdrop-filter: blur(6px);
    border-radius: 10px;
}

#clock-container {
  position: fixed;
  top: 20px;
  right: 20px;
  display: flex;
  align-items: center;
  font-size: 2rem;
  font-weight: bold;
  cursor: pointer;
}

#date-dropdown {
  display: none;
  position: absolute;
  top: 50px;
  right: 0;
  width: 200px;
  padding: 10px;
  color: #78331e;
  background: rgba(217, 217, 217, 0.58);
    border: 1px solid white;
    box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
    backdrop-filter: blur(6px);
    border-radius: 10px;
  z-index: 999;
}

#date-dropdown:before {
  content: "";
  display: block;
  position: absolute;
  top: -10px;
  right: 10px;
  border: 10px solid transparent;
  border-bottom: 10px solid #fff;
  background: rgba(217, 217, 217, 0.58);
    border: 1px solid white;
    box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
    backdrop-filter: blur(6px);
    border-radius: 10px;
}

#date {
  font-size: 1.2rem;
  font-weight: normal;
}

.my-alert-class{
  font-family: 'Kanit', sans-serif;
}

</style>