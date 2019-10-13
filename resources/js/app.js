import Vue from 'vue'
// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App.vue'

import Vuetify from 'vuetify'

import "../../node_modules/vuetify/dist/vuetify.min.css";

Vue.use(Vuetify);

new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  router, // ルーティングの定義を読み込む
  components: { App }, // ルートコンポーネントの使用を宣言する
  template: '<App />' // ルートコンポーネントを描画する
})