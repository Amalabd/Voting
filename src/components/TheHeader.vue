<template>
  <!-- Native Bootstrap 5 navbar (fixed to top) -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container-fluid">
      <!-- Use the project's logo image as the brand (not a link) -->
      <span class="navbar-brand mb-0 h1">
        <img src="../assets/logo2.png" alt="Logo" style="height:50px; width:auto;" class="d-inline-block align-top" />
      </span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-collapse" aria-controls="nav-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="nav-collapse">
        <span class="navbar-nav me-auto mb-2 mb-lg-0">Voting Hub</span>

        <ul class="navbar-nav ms-3 align-items-center ">

          <li class="nav-item">
            <!-- language switcher component to change lang -->
            <LanguageSwitcher />
          </li>

          <li class="nav-item dropdown ms-2 " v-if="auth.user">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><em><i class="bi bi-person-fill"></i> {{ $t('nav.user') }}</em></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><router-link class="dropdown-item" to="/profile">{{ $t('nav.profile') }}</router-link></li>
              <li><a class="dropdown-item" style="cursor: pointer;" @click="logout">{{ $t('nav.signOut') }}</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import router from '@/router';
import LanguageSwitcher from './LanguageSwitcher.vue'
import { useAuth } from '@/stores/auth'


export default {
  name: 'AppHeader',
  components: {
    LanguageSwitcher
    },
    setup() {
    const auth = useAuth()
    const logout = () => {
      auth.logout()
      // to remove the modal
      document.body.classList.remove('modal-open');
      document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
      // to go to home
      router.push('/')
    }
    return { auth, logout }
  },
  data() {
    return {
    };
  }
}
</script>