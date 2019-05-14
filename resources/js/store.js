export default {
    state: {
        welcome: 'Hola!'
    },
    getters: {
        welcome (state) {
            return state.welcome
        }
    }
}
