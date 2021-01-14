import Vue from 'vue';
import Vuex from 'vuex';

import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      token: null,
      isUserLoggednIn: false,
      userDetails: {},
      entry_questions: []
  },
  getters:{
    getLogged(state){
        return state.isUserLoggednIn;
    },
    getUserDetails(state){
      return state.userDetails
    },
    getEntryQuestions(state){
      return state.entry_questions;
    }
  },
  mutations: {
    SET_TOKEN(state, token){
        state.token = token
        state.isUserLoggedIn = true
    },
    SET_USER_DETAILS(state, payload){
      state.userDetails = payload
      state.isUserLoggednIn = true
    },
    SET_ENTRY_QUESTIONS(state, payload){
      state.entry_questions = payload;
    }
  },
  actions: {
    saveUserToken({ commit }, token){
        commit('SET_TOKEN', token)
      },
    setUserDetails({ commit }){
      const token = localStorage.getItem('token')
      const config = {
        headers: { Authorization: `Bearer ${token}` }
      };
      axios.get('me', config)
      .then((response) => {
        commit('SET_USER_DETAILS', response.data)
        // console.log('+++++++++++++',response.data.details.roles[0].slug);
        localStorage.setItem('role', response.data.details.roles[0].slug)
      })
      .catch((err) => {
        console.log(err)
      })
    },
    setEntryQuestions({ commit }){
      axios.get('entrance_quiz/1')
      .then((response) => {
        commit('SET_ENTRY_QUESTIONS', response.data.questions);
      })
      .catch((err) => {
        console.log(err)
      })
    }
  },
  modules: {
  }
})