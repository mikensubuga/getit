<template>


<div class="card grey lighten-3 chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">




 <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message">
    <ul class="list-unstyled chat">
        <li class="d-flex justify-content-between mb-4" v-for="message in messages">
              <img :src="'http://getit.com/storage/' + message.user.avatar" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1" height="50px" width="50px">
              <div class="chat-body white w-100 p-3 z-depth-1">
                <div class="header">
                  <strong class="primary-font">{{message.user.name}}</strong>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  {{message.message}}
                </p>
              </div>
            </li>
    </ul>
    </div>
 </div>


    </div>
  </div>
</div>
</template>

<script>
  export default {
    props: ['messages']
  };
</script>
