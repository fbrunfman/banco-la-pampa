export default {
    state: {
        empleado: {
            nombre: 'federico'
        },
        login: false
    },
    mutations: {
        empleado (state, empleados) {
            state.empleados = empleado
        },
        login (state, login) {
            state.login = login
        }
    }
}
