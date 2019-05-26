import Axios from "axios";

export default {
    state: {
        login: false,
        paginaPrincipal: true,
        infoEmpleado: '',
        token: localStorage.getItem('access_token') || null
    },
    mutations: {
        infoEmpleado (state, infoEmpleado) {
            state.infoEmpleado = infoEmpleado
        },
        login (state, login) {
            state.login = login
        },
        paginaPrincipal (state, paginaPrincipal) {
            state.paginaPrincipal = paginaPrincipal
        },
        retrieveToken (state, token) {
            state.token = token
        },
        destroyToken (state) {
            state.token = null
        }

    },
    getters: {
        loggedIn(state) {
            return state.token !== null
        }
    },
    actions: {
        destroyToken(context) {
            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token

            if (context.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    Axios.post('/api/logout')
                    .then(response => {
                        localStorage.removeItem('access_token')
                        context.commit('destroyToken')
                        resolve(response)
                        /* console.log(response); */
                    })
                })
            }
        },
        retrieveToken(context, credentials) {
            return new Promise((resolve, reject) => {
                Axios.post('/api/login', {
                    username: credentials.username,
                    password: credentials.password
                })
                .then(response => {
                    const token = response.data.access_token
                    localStorage.setItem('access_token', token)
                    context.commit('retrieveToken', token)
                    resolve(response)
                    /* console.log(response); */
                })
                .catch((error) => {
                    alert('Usuario o contrasena incorrectos')
                })
            })
        }
    }
}
