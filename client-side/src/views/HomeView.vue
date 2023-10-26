<script>
import { mapActions, mapState } from 'pinia'
import Card from '../components/CardPatient.vue'
import Loader from '../components/Loader.vue'
import { useStateStore } from '../stores/state'

export default {
  components: {
    Card,
    Loader
  },
  async created() {
    this.fetchData()
  },
  methods: {
    ...mapActions(useStateStore, ['fetchData'])
  },
  computed: {
    ...mapState(useStateStore, ['loading', 'patients'])
  },
}
</script>

<template>
  <div class=" xl:mx-auto max-w-7xl mx-5 ">
    <div v-if="loading" class="flex items-center justify-center mt-72">
      <Loader />
    </div>
    <div v-else class="flex items-center justify-center">
      <table v-if="patients.length" className="table">
    <!-- {/* head */} -->
    <thead>
      <tr>
        <th>Name</th>
        <th>NIK</th>
        <th>Phone Number</th>
        <th>Religion</th>
        <th>Address</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <Card v-for="patient in patients" :key="patient.id" :data="patient" :fetchData="fetchData" />
    </tbody>
  </table>
    </div>
    <div v-if="!loading && !patients.length" class="text-2xl text-center text-black">
      No data
    </div>
  </div>
</template>
