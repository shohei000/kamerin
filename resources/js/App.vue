<template>
  <v-app id="inspire">
    <div>
      <header>
        <Navbar />
      </header>    
      <main>
        <div>
          <RouterView />
          <!-- <v-bottom-navigation :value="activeBtn" grow>

            <RouterLink to="/">
              <v-btn value="home">
                <span>ホーム</span>
                <v-icon medium>mdi-home</v-icon>
              </v-btn>
            </RouterLink>
            
            <RouterLink to="/search">    
              <v-btn value="search">
                <span>さがす</span>
                <v-icon medium>mdi-account-search</v-icon>
              </v-btn>
            </RouterLink>

            <RouterLink to="/mypage">
              <v-btn value="mypage">
                <span>マイページ</span>
                <v-icon medium>mdi-account-circle</v-icon>
              </v-btn>
            </RouterLink>

          </v-bottom-navigation> -->
        </div>
      </main>
      <Footer />
    </div>
  </v-app>
</template>

<script>
  import { INTERNAL_SERVER_ERROR } from './util'
  import Navbar from './components/Navbar.vue'
  import Footer from './components/Footer.vue'
  export default {
    components: {
      Navbar,
      Footer
    },
    computed: {
      errorCode () {
        return this.$store.state.error.code
      }
    },
    watch: {
      errorCode: {
        handler (val) {
          if (val === INTERNAL_SERVER_ERROR) {
            this.$router.push('/500')
          }
        },
        immediate: true
      },
      $route () {
        this.$store.commit('error/setCode', null)
      }
    }
  }
</script>