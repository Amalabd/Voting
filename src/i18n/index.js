import { createI18n } from 'vue-i18n'
import en from './en.json'
import de from './de.json'
// to gather all translations in one place(object) for easier maintenance
const messages = { en, de }

function getDefaultLocale() {
  try {
    const saved = localStorage.getItem('locale')
    if (saved) return saved
    const nav = (navigator && (navigator.language || navigator.userLanguage)) || 'en'
    return nav.startsWith('de') ? 'de' : 'en'
  } catch (e) {
    return 'en'
  }
}

export default function createI18nInstance() {
  return createI18n({
    legacy: false,
    locale: getDefaultLocale(),
    fallbackLocale: 'en',
    // allow global $t in templates and Options API even with composition-mode (legacy: false)
    globalInjection: true,
    messages,
  })
}
