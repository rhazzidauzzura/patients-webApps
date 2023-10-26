import { defineStore } from 'pinia'
import { toast } from '../helpers/swal';
import axios from 'axios'
import { swalConfirm } from '../helpers/swal';

const api = axios.create({
  baseURL: 'http://localhost:8000',
});

export const useStateStore = defineStore('state', {
  state: () => {
    return {
      patients: [],
      patient: {},
      loading: false,
    }
  },
  actions: {
    async handleDelete(id) {
      try {
         swalConfirm(() => {
          api.delete('/patients/' + id)
          this.fetchData()
          toast('success', `Success Deleted Data Patient`)
        });
      } catch (error) {
        toast('error', error.message)
      }
    },
    async fetchData() {
      this.loading = true
      try {
        const res = await api.get('/patients')
        this.patients = res.data.result
      } catch (error) {
        toast('error', error.message)
      } 
      finally { setTimeout(() => this.loading = false, 1000) }
    },
    async handleUpdateOrCreate(state, id) {
      this.loading = true
      try {
        const endpoint = id ? `/patients/${id}` : '/patients'
        const methods = id ? 'put' : 'post'
        await api[methods](endpoint, state, {
          headers: {
            'Content-Type': 'application/json'
          }
        })
        toast('success', `Success ${id ? 'Updated' : 'Created'} Data Patient`)
      } catch (error) {
        toast('error', error.message)
      } finally { this.loading = false }
    },
    async getDetail(id) {
      try {
        const res = await api.get(`/patients/${id}`)
        this.patient = res.data?.result
      } catch (error) {
        toast('error', error.message)
      }
    },
  }
})
