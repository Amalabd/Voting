<template>
  <div>
    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
      {{ $t('login') }}
    </button>

    <div class="modal fade" id="loginModal" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">{{ $t('login') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">
            <form @submit.prevent="login">
              <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label">Email :</label>
                <div class="col-sm-8">
                  <input v-model="email" type="text" class="form-control" id="email" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="password" class="col-sm-4 col-form-label">{{ $t('password') }}:</label>
                <div class="col-sm-8">
                  <input v-model="password" type="password" class="form-control" id="password" />
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit">{{ $t('login') }}</button>
              </div>
            </form>
            <p v-if="error" class="text-danger mt-2">{{ error }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import router from '@/router'
import { useAuth } from '@/stores/auth'
//import * as bootstrap from 'bootstrap'

export default {
  name: "LoginBut",
  setup() {
    const auth = useAuth()
    const email = ref("")
    const password = ref("")
    const error = ref("")

    const login = async () => {
      try {
        const response = await fetch("http://localhost:8000/apiFile.php?action=login", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            email: email.value,
            password: password.value
          })
        });

        const result = await response.json()

        if (result.success) {
          auth.setUser(result.user)

          // to close the modal
          const el = document.getElementById('loginModal')
          if (el && window.bootstrap) {
          const modal = window.bootstrap.Modal.getInstance(el) || new window.bootstrap.Modal(el)
          modal.hide()
          }
          // to remove the modal backdrop (fallback)
          requestAnimationFrame(() => {
            document.body.classList.remove('modal-open')
            document.body.style.removeProperty('padding-right')
            document.querySelectorAll('.modal-backdrop').forEach(n => n.remove())
          })

          router.push('/profile')
        } else {
          error.value = result.message || "Invalid login"
        }
      } catch (e) {
        console.error(e)
        error.value = "Login failed"
      }
    }

    return { email, password, error, login }
  }
}
</script>
