<script>
import { mapActions, mapState } from 'pinia';
import { useStateStore } from '../stores/state';

export default {
  data() {
    return {
      state: {},
      id: this.$route.params.id
    }
  },
  computed: {
    ...mapState(useStateStore, ['loading', 'patient'])
  },
  async created() {
    if (this.id) { this.getDetail(this.id).then(() => this.state = this.patient) }
  },
  methods: {
    ...mapActions(useStateStore, ['getDetail', 'handleUpdateOrCreate']),
    async handleSubmit() {
      this.handleUpdateOrCreate(this.state, this.id).then(() => {
        this.$router.push('/')
      })
    },
  }
}

</script>

<template>
  <div class="flex justify-center">
    <form @submit.prevent="handleSubmit" class="w-full bg-white p-10 rounded-lg max-w-lg">
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Name
          </label>
          <input required v-model="state.name"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name" type="text" placeholder="Input Your Name" />
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            NIK
          </label>
          <input required v-model="state.nik"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-last-name" type="number" placeholder="Input Your NIK" />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            PhoneNumber
          </label>
          <input required v-model="state.phone"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-password" type="number" maxlength="10" placeholder="Input Your PhoneNumber" />
          <!-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> -->
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Address
          </label>
          <input required v-model="state.address"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-password" type="text" placeholder="Input Your Address" />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Religion
          </label>
          <div class="relative">
            <select v-model="state.religion"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-state" required>
              <option selected disabled>--Religion--</option>
              <option>Islam</option>
              <option>Protestan</option>
              <option>Katolik</option>
              <option>Hindu</option>
              <option>Buddha</option>
              <option>Khonghucu</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Sex
          </label>
          <div class="relative">
            <select v-model="state.sex"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-state" required>
              <option selected disabled>--Sex--</option>
              <option>Male</option>
              <option>Female</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <button :disabled="loading" class="btn w-full btn-dark">{{ loading ? 'Loading...' : 'Submit' }}</button>
    </form>
  </div>
</template>
