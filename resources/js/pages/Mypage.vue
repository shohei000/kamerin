<template>
  <div>
    <button v-if="isLogin" class="button button--link" @click="logout">
      Logout
    </button>
    <div class="page-bar">マイページ</div>
    <div id="mypage">
      <div class="grapher-cap"><img src="/assets/img/human/1.jpg" alt=""></div>
      <div class="grapher-name">{{ user.name }}</div>
      <v-card>
        <v-tabs>
          <v-tab>プロフィール</v-tab>
          <v-tab>作品一覧</v-tab>
          <v-tab-item :key="1">
            <v-container fluid>
              <div class="mydata">
                <div class="mydata-title">活動場所</div>
                <input type="text" class="mydata-content" v-model="user.location">
              </div>
              <div class="mydata">
                <div class="mydata-title">自己紹介</div>
                <v-bottom-sheet v-model="sheet.profile_text">
                  <template v-slot:activator="{ on }">
                    <div class="mydata-content mydata-content--line2 arrow" v-on="on"><span>{{ user.profile_text }}</span></div>
                  </template>
                  <v-sheet>
                    <EditText :longtext="user.profile_text" v-model="user.profile_text" key="profile_text"/>
                  </v-sheet>
                </v-bottom-sheet>
              </div>
              <div class="mydata">
                <div class="mydata-title">Twitterアカウント</div>
                <input type="text" class="mydata-content" v-model="user.twitter">
              </div>
              <div class="mydata">
                <div class="mydata-title">料金</div>
                <div class="mydata-content">
                  <v-radio-group v-model="user.price">
                    <v-radio :key="1" :label="`Free！`" :value="1"></v-radio>
                    <v-radio :key="2" :label="`応相談`" :value="2"></v-radio>
                  </v-radio-group>
                </div>
              </div>
              <div class="mydata mydata--dm">
                <div class="mydata-title">Twitterダイレクトメッセージ</div>
                <div class="mydata-content"><span>受け付ける</span><v-switch v-model="user.dm_ok"></v-switch></div>
              </div>
              <!-- <div class="mydata">
                <div class="mydata-title">ジャンル</div>
                <div class="mydata-content">
                  <ul class="genre-list">
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: checkedVal[0] }">
                        <v-checkbox v-model="checkedVal[0]" v-bind:value="checkedVal[0]"></v-checkbox>
                        <img src="/assets/img/genre/band.png" alt="">
                      </div>
                      <div class="genre-name">バンド</div>
                    </li>
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: checkedVal[1] }">
                        <v-checkbox v-model="checkedVal[1]"></v-checkbox>
                        <img src="/assets/img/genre/solo.png" alt="">
                      </div>
                      <div class="genre-name">シンガー</div>
                    </li>
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: checkedVal[2] }">
                        <v-checkbox v-model="checkedVal[2]"></v-checkbox>
                        <img src="/assets/img/genre/layer.png" alt="">
                      </div>
                      <div class="genre-name">レイヤー</div>
                    </li>
                  </ul>
                </div>
              </div> -->
              <div class="mydata">
                <div class="mydata-title">機材</div>
                <v-bottom-sheet v-model="sheet.tool">
                  <template v-slot:activator="{ on }">
                    <div class="mydata-content mydata-content--line2 arrow" v-on="on"><span>{{ user.tool }}</span></div>
                  </template>
                  <v-sheet>
                    <EditText :longtext="user.tool" v-model="user.tool" key="tool"/>
                  </v-sheet>
                </v-bottom-sheet>
              </div>
            </v-container>
            <div class="btn-wrap update-btn-wrap"><button class="btn" @click="submit">更新する</button></div>
          </v-tab-item>
          <v-tab-item :key="2">
            <v-container fluid>
              <PhotoForm @fetchUser="fetchUser"/>
              <div class="my-photo">
                <Photo
                  class="my-photo-item"
                  v-for="photo in user.photos"
                  :key="photo.id"
                  :photo="photo"
                  :user="user"
                />
              </div>
            </v-container>
          </v-tab-item>
        </v-tabs>
      </v-card>

      

    </div>
      
  </div>
</template>


<script>
  import EditText from '../components/EditText.vue'
  import PhotoForm from '../components/PhotoForm.vue'
  import Photo from '../components/Photo.vue'
  import { mapState, mapGetters } from 'vuex'
  export default {
    components: {
      EditText,
      PhotoForm,
      Photo,
    },
    data () {
      return {
        tab: null,
        tabs: 2,
        user:'',
        checkedVal:[],
        sheet: {
          'profile_text':false, 
          'tool':false
        },
      }
    },
    computed: {
      ...mapState({
        apiStatus: state => state.auth.apiStatus
      }),
      ...mapGetters({
        isLogin: 'auth/check'
      })
    },
    methods: {
      async fetchUser () {
        const response = await axios.get(`/api/auth_user/`)
        this.user = response.data;
        this.checkedVal = response.data.genres;
      },
      async logout () {
        await this.$store.dispatch('auth/logout')
        if (this.apiStatus) {
          this.$router.push('/login')
        }
      },
      async submit () {
        const response = await axios.post('/api/profile_update', this.user)
      }
    },
    watch: {
      $route: {
        async handler () {
          await this.fetchUser()
        },
        immediate: true
      }
    }
  }
</script>