<template>
  <div class="container mt-4">
    <h2>Bootstrap JS Demo</h2>

    <button
      type="button"
      class="btn btn-primary"
      ref="tooltipBtn"
      data-bs-toggle="tooltip"
      title="This is a Bootstrap tooltip!"
    >
      Hover me (tooltip)
    </button>

    <button class="btn btn-success ms-3" @click="openModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" ref="demoModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Demo Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>This modal is controlled via Bootstrap's JavaScript API from a Vue component.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue'

export default {
  name: 'BootstrapDemo',
  setup() {
    const tooltipBtn = ref(null)
    const demoModal = ref(null)
    let modalInstance = null

    onMounted(() => {
      // Use Bootstrap's global namespace (expects bootstrap.bundle.js imported)
      const bootstrap = window.bootstrap
      if (bootstrap) {
        // Initialize tooltip
        new bootstrap.Tooltip(tooltipBtn.value)

        // Create modal instance to control it programmatically
        modalInstance = new bootstrap.Modal(demoModal.value)
      } else {
        // eslint-disable-next-line no-console
        console.warn('Bootstrap JS not found. Make sure you imported bootstrap.bundle.min.js')
      }
    })

    function openModal() {
      if (modalInstance) modalInstance.show()
    }

    return { tooltipBtn, demoModal, openModal }
  }
}
</script>

<style scoped>
.container {
  text-align: left;
}
</style>
