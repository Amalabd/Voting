<template>

  <li class="nav-item dropdown ms-2 mr-5">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><em><i class="bi bi-translate"></i> {{ $t('nav.lang') }}</em></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><button type="button" class="btn btn-sm " :class="{active: locale === 'en'}" @click="set('en')"><i class="bi bi-translate"></i> EN</button><br></li>
              <li><button type="button" class="btn btn-sm " :class="{active: locale === 'de'}" @click="set('de')"><i class="bi bi-translate"></i> DE</button>
</li>
            </ul>
          </li>
</template>

<script>
import { useI18n } from 'vue-i18n'

export default {
  name: 'LanguageSwitcher',
  setup() {
    const { locale } = useI18n()

    function set(l) {
      locale.value = l
      try {
        localStorage.setItem('locale', l)
      } catch (e) {
        // ignore write errors
      }
    }

    return { locale, set }
  }
}
</script>

<style scoped>
.active {
  background-color: rgba(255,255,255,0.15) !important;
}
</style>
