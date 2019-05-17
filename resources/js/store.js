export default {
    state: {
        empleado: {
            nombre: 'federico'
        },
        login: false,
        paginaPrincipal: true
    },
    mutations: {
        empleado (state, empleados) {
            state.empleados = empleado
        },
        login (state, login) {
            state.login = login
        },
        paginaPrincipal (state, paginaPrincipal) {
            state.paginaPrincipal = paginaPrincipal
        }

    }
}
