import './bootstrap'

import Vue from 'vue'
// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App.vue'

import Vuetify from 'vuetify'

import store from './store'

import "../../node_modules/vuetify/dist/vuetify.min.css";
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify);

const createApp = async () => {
  await store.dispatch('auth/currentUser')
  new Vue({
    el: '#app',
    store,
    iconfont: 'md',
    vuetify: new Vuetify(),
    router, // ルーティングの定義を読み込む
    components: { App }, // ルートコンポーネントの使用を宣言する
    template: '<App />' // ルートコンポーネントを描画する
  })
}

createApp()
