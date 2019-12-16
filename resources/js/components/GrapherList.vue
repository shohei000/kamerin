<template>

  <div class="grapher-list-wrap inner">
    <v-bottom-sheet v-model="sheet">

      <template v-slot:activator="{ on }">
        <div class="grapher-list">
          <div
            class="grapher-box"
            v-for="user in users"
            :key="user.id"
          >
            <div class="grapher-photos-wrap">
              <div class="grapher-box-photos" data-photos>
                <Photo
                  class="my-photo-item"
                  v-for="photo in user.photos"
                  :key="photo.id"
                  :photo="photo"
                  :user="user"
                />
              </div>
<!--               <div class="dots">
                <span class="is-active"></span>
                <span></span>
                <span></span>
              </div> -->
            </div>
            <div class="grapher-box-link" v-ripple v-on="on" @click="detailUpdate(user.id)">
              <div class="grapher-box-info">
                <div class="grapher-box-name">{{ user.name }}</div>
                <div class="grapher-box-pref">{{ user.location }}</div>
              </div>
              <span class="btn">みてみる</span>
            </div>
          </div>
         <!--  <GrapherBox 
            v-for="user in users"
            :key="user.id"
            :user="user"
          /> -->
        </div>
      </template>

      <v-sheet>
        <GrapherDetail :user="sheet_user" />
      </v-sheet>

    </v-bottom-sheet>      
  </div>

    
</template>


<script>
import GrapherBox from '../components/GrapherBox.vue'
import GrapherDetail from '../components/GrapherDetail.vue'
import Photo from '../components/Photo.vue'
export default {
  components: {
    GrapherBox,
    GrapherDetail,
    Photo
  },
  props: {
    page: {
      type: Number,
      required: false,
      default: 1
    }
  },
  data () {
    return {
      sheet: false,
      users: [],
      sheet_user:{},
      currentPage: 0,
      lastPage: 0
    }
  },
  methods: {
    async fetchUsers () {
      const response = await axios.get(`/api/users/?page=${this.page}`)
      this.users = response.data.data
      this.currentPage = response.data.current_page
      this.lastPage = response.data.last_page
    },
    detailUpdate(user_id){
      this.sheet_user = this.users[user_id - 1];
    }
  },
  watch: {
    $route: {
      async handler () {
        await this.fetchUsers()
      },
      immediate: true
    }
  }
}
</script>
