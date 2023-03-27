<template>
  
  <div class="container py-4">
    <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 fw-bold" style="font-size: 50px">Rumah Sakit Nirmala Suri Sukoharjo</span>
      </a>
    </header>
  </div>
  <body>
    <div class="p-5 mb-4 bg-secondary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold" style="color: white;">Bagaimana Pelayanan Kami?</h1>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-4">
        <div class="h-100 p-5 text-white bg-success rounded-3">
          <h2>Puas</h2>
          <button class="btn btn-outline-light" @click="survey(1)">
            <span role="img" aria-label="emoji" style="font-size: 50px;">😄</span>
            <br>
            <span style="font-size: 24px;">PUAS</span>
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="h-100 p-5 bg-warning rounded-3">
          <h2>Cukup</h2>
          <button class="btn btn-outline-dark" @click="survey(2)">
            <span role="img" aria-label="emoji" style="font-size: 50px;">😐</span>
            <br>
            <span style="font-size: 24px;">CUKUP</span>
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="h-100 p-5 bg-danger rounded-3">
          <h2>Tidak Puas</h2>
          <button class="btn btn-outline-light" @click="survey(0)">
            <span role="img" aria-label="emoji" style="font-size: 50px;">😞</span>
            <br>
            <span style="font-size: 24px;">TIDAK PUAS</span>
          </button>
        </div>
      </div>
    </div>
  </body>
    
    <!-- Modal -->
    <div class="modal" id="thankYouModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Terima Kasih!</h5>
          </div>
          <div class="modal-body">
            <p>Terima kasih telah memberikan feedback.</p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</template>
  
<script>
import axios from 'axios';

export default {              
  methods: {
    survey(value) {
  console.log(`Hello ${value}!`);
  var body = {
    value: value,
    // field_name: field_value,
    // field_name: field_value,
    // field_name: field_value,
    // field_name: field_value,
  };
  axios({
    method: 'post',
    url: '/surveys',
    data: body
  })
  .then(function (response) {
    console.log(response);
    alert('Terima kasih telah memberikan feedback!');
    setTimeout(function(){
      window.location.href = "/";
    }, 3000);
  })
  .catch(function (error) {
    console.log(error);
  });
}
  }
}
</script>