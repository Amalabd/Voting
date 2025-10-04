<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <h4>{{ $t('chooseCandidate') }}</h4>

      <!-- cards -->
      <div v-for="(c, idx) in candidates" :key="c.id" class="card m-3" style="width: 12rem;">
        <img :src="c.img" class="card-img-top" alt="" height="200" />
        <div class="card-body">
          <h5 class="card-title">{{ c.name }}</h5>
          <p class="card-text">Short description…</p>

          <!-- 4-star widget (radio 1..4, reversed to work with the CSS) -->
          <div class="star-rating animated-stars">
            <template v-for="n in [4,3,2,1]" :key="n">
              <input type="radio" :id="`c${c.id}-s${n}`" :name="`rating-${c.id}`" :value="n" v-model.number="c.rating" :disabled="isDisabled(idx, n)"/>
              <label :for="`c${c.id}-s${n}`" class="bi bi-star-fill" :class="{ disabled: isDisabled(idx, n) }" title="vote"></label>
            </template>
          </div>

          <div class="small text-muted mt-1">{{ c.rating }} / 4</div>
        </div>
      </div>

      <!-- footer / submit -->
      <div class="w-100 text-center m-4">
        <div class="mb-2">{{ $t('remaining') }}: {{ remaining }} (max 4)</div>
        <button type="button" :disabled="totalSelected === 0" @click="submitVotes">
          {{ $t('submit') }} &#10004;
        </button>
        <div v-if="error" class="text-danger mt-2">{{ error }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'VotingView',
  data() {
    return {
      maxTotal: 4,
      candidates: [
        { id: 1, name: 'Adam',   img: require('../assets/styles/alex.jpg'),  rating: 0 },
        { id: 2, name: 'Nancy',  img: require('../assets/styles/andro.jpg'), rating: 0 },
        { id: 3, name: 'Alex',   img: require('../assets/styles/man.png'),   rating: 0 },
        { id: 4, name: 'Amanda', img: require('../assets/styles/woman.png'), rating: 0 },
      ],
      user: null,
      error: ''
    };
  },
    mounted() {
    // Get user from sessionStorage
    const stored = sessionStorage.getItem("user");
    if (stored) {
      this.user = JSON.parse(stored);
    }
  },
  computed: {
    totalSelected() {
      return this.candidates.reduce((s, c) => s + (Number(c.rating) || 0), 0);
    },
    remaining() {
      return this.maxTotal - this.totalSelected;
    }
  },
  methods: {
    // disable choices that would push the total over 4
    isDisabled(idx, n) {
      const current = Number(this.candidates[idx].rating) || 0; // this candidate now
      const others  = this.totalSelected - current;    // stars from other cards
      const canAdd  = this.maxTotal - others;   // how many we can assign here
      // allow decreasing (n <= current) anytime; block only increases > remaining
      return n > current + canAdd;
    },

    async submitVotes() {
      if (this.totalSelected > this.maxTotal) {
        this.error = `Max total is ${this.maxTotal}.`;
        return;
      }
      this.error = '';

      const votes = this.candidates
        .filter(c => c.rating > 0)
        .map(c => ({ id: c.id, votes: c.rating }));

      const userId = this.user ? this.user.id : null;

      try {
        const res = await fetch('http://localhost:8000/apiFile.php?action=submitVotes', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ votes, userId })
        });
        const json = await res.json();
        // handle success (toast, route, etc.)
        if (json.success) {
          alert('Votes submitted successfully!');
          this.$router.push('/profile');
        } else {
          this.error = json.message || 'Submission failed.';
        }
        console.log(json);
      } catch (e) {
        this.error = 'Submit failed.';
        console.error(e);
      }
    }
  }
};
</script>

<style scoped>
.star-rating {
  direction: rtl;          /* to make the fill animation work right-to-left */
  display: inline-block;
  cursor: pointer;
}
.star-rating input { display: none; }
.star-rating label {
  color: #ddd;
  font-size: 24px;
  padding: 0 2px;
  cursor: pointer;
  transition: transform 0.2s ease, color 0.2s ease, opacity 0.2s ease;
}
.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label {
  color: #ffc107;
}
.star-rating label.disabled {
  opacity: .35;
  cursor: not-allowed;
}
</style>
