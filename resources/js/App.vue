<template>
  <v-app id="inspire">
    <div>
      <main>
        <div>
          <RouterView />
          <v-bottom-navigation :value="activeBtn" grow>

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

          </v-bottom-navigation>
        </div>
      </main>
    </div>
  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        activeBtn: 'home',
      }
    },
  }  
</script>