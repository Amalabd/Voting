<template>
  <div class="app-shell">
    <AppHeader/>

  <main id="app-main">
    <router-view :key="$route.fullPath"/>
  </main>
  <TheFooter/>
  </div>
</template>

<script>
import TheHeader from './components/TheHeader.vue'
import TheFooter from './components/TheFooter.vue';

export default {
  name: 'App',
  components: {
    AppHeader: TheHeader,
    TheFooter
  }
}
</script>

<style>

</style>
