export default {
    state: {
        welcomeMessage: 'Welcome to my vue spa app'
    },
    getters: {
        welcome(state){
            return state.welcomeMessage;
        }
    },
    mutations: {},

    actions: {}
};