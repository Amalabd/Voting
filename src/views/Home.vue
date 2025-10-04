<template>
<div class="hello">
  <img alt="Vue logo" src="../assets/logo2.png" height="300" />

  <h1>{{ $t('welcome') }}</h1>
  <h5>{{ $t('note') }}</h5>
  <p class="text-muted">{{ $t('forTrial') }} : (Email: user@gmail.com, Password: 123456) </p>
  <loginBut class="mt-3 mb-3"/>

  </div>
</template>

<script>
import loginBut from '../components/loginBut.vue';  
export default {
  name: 'HomeView',
  props: {
  },
  components: {
    loginBut
  }
}
</script>

<style scoped>

</style>
