<template>
  <div class="photo-form">
    <div v-show="loading" class="panel">
      <Loader>Sending your photo...</Loader>
    </div>
    <form v-show="! loading" class="form" @submit.prevent="submit">
      <div class="errors" v-if="errors">
        <ul v-if="errors.photos">
          <li v-for="msg in errors.photos" :key="msg">{{ msg }}</li>
        </ul>
      </div>
      <input class="form__item" type="file" @change="onFileChange" multiple>
      <input class="form__item" type="file" @change="onFileChange" multiple>
      <output class="form__output" v-for="(preview, i) in previews" v-if="preview" :key="i">
        <img :src="preview" alt="">
      </output>
      <div class="form__button">
        <button type="submit" class="button button--inverse">submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY } from '../util'
import Loader from './Loader.vue'
export default {
  components: {
    Loader
  },
  data () {
    return {
      loading: false,
      previews: [],
      photos: [],
      errors: null
    }
  },
  methods: {
    onFileChange (event) {
      if (event.target.files.length === 0) {
        this.reset()
        return false
      }

      if (! event.target.files[0].type.match('image.*')) {
        this.reset()
        return false
      }

      const reader = new FileReader()

      reader.onload = e => {
        this.previews.push(e.target.result)
      }

      reader.readAsDataURL(event.target.files[0])
      this.photos.push(event.target.files[0])
      
    },
    reset () {
      this.previews = []
      this.photos = []
      this.$el.querySelector('input[type="file"]').value = null
    },
    async submit () {
      this.loading = true

      let formData = new FormData()
      this.photos.forEach((v) => {
        formData.append('photos[]', v)
      });
      
      const response = await axios.post('/api/photos', formData)
      
      this.loading = false

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors
        return false
      }

      this.reset()
      this.$emit('input', false)
      this.$emit('fetchUser')
      if (response.status !== CREATED) {
        this.$store.commit('error/setCode', response.status)
        return false
      }

      // this.$store.commit('message/setContent', {
      //   content: '写真が投稿されました！',
      //   timeout: 6000
      // })

      // this.$router.push('/mypage')
    }
  }
}
</script>
