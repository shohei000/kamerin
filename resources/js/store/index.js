import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    sheet_user: 0
  },
  mutations: {
    updateSheet (state, user_id) {
      this.state.sheet_user = user_id; 
    }
  },
  getters: {
    getSheet (state) {
      return state.sheet_user
    }
  },
})

export default store
