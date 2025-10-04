import { defineStore } from 'pinia'

export const useAuth = defineStore('auth', {
  state: () => ({
    user: JSON.parse(sessionStorage.getItem('user') || 'null')
  }),
  actions: {
    setUser(u) {
      this.user = u
      if (u) sessionStorage.setItem('user', JSON.stringify(u))
      else sessionStorage.removeItem('user')
    },
    logout() {
      this.setUser(null)
    }
  }
})
