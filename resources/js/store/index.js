import Vue from 'vue';
import Vuex from 'vuex';

import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    token: null,
    isUserLoggednIn: false,
    userDetails: {},
    courseDetails: {},
    entry_questions: []
  },
  getters: {
    getLogged(state) {
      return state.isUserLoggednIn;
    },
    getUserDetails(state) {
      return state.userDetails;
    },
    getCourseDetails(state) {
      return state.courseDetails;
    },
    getEntryQuestions(state) {
      return state.entry_questions;
    }
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token
      state.isUserLoggedIn = true
    },
    SET_USER_DETAILS(state, payload) {
      state.userDetails = payload
      state.isUserLoggednIn = true
    },
    SET_COURSE_DETAILS(state, payload) {
      state.courseDetails = payload;
      // state.isUserLoggednIn = true
    },
    SET_ENTRY_QUESTIONS(state, payload) {
      state.entry_questions = payload;
    }
  },
  actions: {
    saveUserToken({ commit }, token) {
      commit('SET_TOKEN', token)
    },
    setUserDetails({ commit }) {
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

    setCourseDetails({ commit }) {
      axios.get('user_course').then((response) => {
        commit('SET_COURSE_DETAILS', response.data)
      })
        .catch((err) => {
          console.log("Dosila se pogreska!")
        })
    },

    setEntryQuestions({ commit }) {
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