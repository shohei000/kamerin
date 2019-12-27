<template>
  <div class="container--small login-register">
    <h1 class="site-name">カメリン</h1>
    <p class="lead">
      カメラマンとして登録しよう！
    </p>
    
    
    <a href="/auth/twitter" class="btn btn--block btn--tw"><span class="icon-tw">twitterでログインする</span></a>

    <ul class="tab">
      <li
        class="tab__item"
        :class="{'tab__item--active': tab === 2 }"
        @click="tab = 2"
      >新規登録</li>
      <li
        class="tab__item"
        :class="{'tab__item--active': tab === 1 }"
        @click="tab = 1"
      >ログイン</li>
    </ul>
    <div class="panel" v-show="tab === 1">
      <form class="form" @submit.prevent="login">
        <div v-if="loginErrors" class="errors">
          <ul v-if="loginErrors.email">
            <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="loginErrors.password">
            <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        
        <div class="inp-wrap">
          <label for="login-email" class="inp">
            <input type="text" class="form__item" id="login-email" v-model="loginForm.email" placeholder="メールアドレス">
            <span class="border"></span>
          </label>
        </div>

        <div class="inp-wrap">
          <label for="login-password" class="inp">
            <input type="password" class="form__item" id="login-password" v-model="loginForm.password" placeholder="パスワード">
            <span class="border"></span>
          </label>
        </div>



        <!-- <input type="text" class="form__item" id="login-email" v-model="loginForm.email" placeholder="メールアドレス"> -->
        <!-- <input type="password" class="form__item" id="login-password" v-model="loginForm.password" placeholder="パスワード"> -->

        
        <div class="form__button">
          <button type="submit" class="btn btn--block button--inverse">ログイン</button>
        </div>
      </form>
    </div>
    <div class="panel" v-show="tab === 2">
      <form class="form" @submit.prevent="register">
        <div v-if="registerErrors" class="errors">
          <ul v-if="registerErrors.name">
            <li v-for="msg in registerErrors.name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.email">
            <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.password">
            <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>

        <div class="inp-wrap">
          <label for="login-email" class="inp">
            <input type="text" class="form__item" id="register-name" v-model="registerForm.name" placeholder="ニックネーム">
            <span class="border"></span>
          </label>
        </div>
        <div class="inp-wrap">
          <label for="login-email" class="inp">
            <input type="text" class="form__item" id="register-email" v-model="registerForm.email" placeholder="メールアドレス">
            <span class="border"></span>
          </label>
        </div>
        <div class="inp-wrap">
          <label for="login-password" class="inp">
            <input type="password" class="form__item" id="register-password" v-model="registerForm.password" placeholder="パスワード">
            <span class="border"></span>
          </label>
        </div>
        <div class="inp-wrap">
          <label for="login-password" class="inp">
            <input type="password" class="form__item" id="register-confirmation-password" v-model="registerForm.password_confirmation" placeholder="パスワード(確認用)">
            <span class="border"></span>
          </label>
        </div>
        
        
        <div class="form__button">
          <button type="submit" class="btn btn btn--block button--inverse">新規登録</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  data () {
    return {
      tab: 2,
      loginForm: {
        email: '',
        password: ''
      },
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  computed: mapState({
    apiStatus: state => state.auth.apiStatus,
    loginErrors: state => state.auth.loginErrorMessages,
    registerErrors: state => state.auth.registerErrorMessages
  }),
  methods: {
    async login () {
      // authストアのloginアクションを呼び出す
      await this.$store.dispatch('auth/login', this.loginForm)

      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push('/')
      }
    },
    async register () {
      // authストアのresigterアクションを呼び出す
      await this.$store.dispatch('auth/register', this.registerForm)

      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push('/')
      }
    },
    clearError () {
      this.$store.commit('auth/setLoginErrorMessages', null)
      this.$store.commit('auth/setRegisterErrorMessages', null)
    }
  },
  created () {
    this.clearError()
  }
}
</script>