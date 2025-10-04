<template>
  <div  class="container">
    
    <div class="card mt-4 row" v-if="user">
  <div class="card-header">
    {{ $t('welcome') }} {{ user.name }}
  </div>
  <div class="card-body">
    <div class="row">
      <dt class="col-4 ">{{ $t('email') }}:</dt>
      <dd class="col-4 ">{{ user.email }}</dd>
    </div>
    <div class="row">
      <dt class="col-4">{{ $t('name') }}:</dt>
      <dd class="col-4">{{ user.name }}</dd>
    </div>
    <div class="row">
      <dt class="col-4">{{ $t('voted') }}:</dt>
      <dd   class="col-4">{{ voted }}</dd>
    </div>
    <div class="row" v-if="Number(user.voted) === 1">
      <p class="col-12 text-muted"><em>{{ $t('cantVote') }}</em></p>
    </div>

    <button :disabled="Number(user.voted) === 1"  @click="$router.push('/voting')"> &#9758; {{ $t('startVoting') }}</button>
    
  </div>
</div>
    
  </div>
</template>

<script>
export default {
  name: "ProfileView",
  data() {
    return {
      user: null,
      voted: ''
    };
  },
  mounted() {
    // Get user from sessionStorage
    const stored = sessionStorage.getItem("user");
    if (stored) {
      this.user = JSON.parse(stored);
      if (Number(this.user.voted) === 1) {
        this.voted = 'Yes';
      } else {
        this.voted = 'No';
      }
    }
  }
};
</script>
