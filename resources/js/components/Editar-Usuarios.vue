<template>
    <div class="main-container mt-5 flex-column">
        <div class="login my-2 d-flex justify-content-center" v-if="!logeado">
            <div class="d-flex align-items-center">
                <span class="mx-2">Usuario:</span>
                <input type="text" v-model="user" class="form-control col-6" id="">
            </div>
            <div class="d-flex flex-row align-items-center">
                <span class="mx-2">Contraseña:</span>
                <input type="password" v-model="password" class="form-control col-6" id="">
            </div>
            <div class="btn btn-secondary" @click="checkLogin">Ingresar</div>
        </div>
        <div class="contenedor-botones" v-if="logeado">
            <div class="my-2 d-flex justify-content-center">
                <div class="btn btn-success"  data-toggle="modal" data-target="#crearUsuario">
                    <h3>Crear usuario</h3>
                </div>
            </div>
            <div class="my-2 d-flex justify-content-center ">
                <div class="btn btn-warning">
                    <h3>Editar usuario</h3>
                </div>
            </div>
            <div class="my-2 d-flex justify-content-center ">
                <div class="btn btn-danger ">
                    <h3>Borrar usuario</h3>
                </div>
            </div>
        </div>
            <form @submit.prevent ref="crear-usuario">
                <div class="modal fade bd-example-modal-xl " id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="CrearUsuario" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Crear usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Nombre:</span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Apellido:</span>
                                    </div>
                                    <input type="text" name="apellido" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Apodo:</span>
                                    </div>
                                    <input type="text" name="apodo" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Función:</span>
                                    </div>
                                    <input type="text" name="funcion" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Area:</span>
                                    </div>
                                    <input type="text" name="area" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Locación:</span>
                                    </div>
                                    <input type="text" name="locacion" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Email:</span>
                                    </div>
                                    <input type="text" name="correo" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Fecha de ingreso:</span>
                                    </div>
                                    <input type="text" name="fecha_de_ingreso" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Equipo:</span>
                                    </div>
                                    <input type="text" name="equipo" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Legajo:</span>
                                    </div>
                                    <input type="text" name="legajo" class="form-control col-6" id="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="crearUsuario">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</template>

<script>
export default {
    name: 'Editar Usuarios',
    data () {
        return {
            user: '',
            password: '',
            logeado: false
        }
    },
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    },
    methods: {
        checkLogin() {
            if (this.user === 'admin' && this.password === 'admin') {
                this.logeado = true
            } else {
                alert('Usuario o contraseña inválidos')
            }
        },
        crearUsuario() {
              var datos = new FormData(this.$refs.crear-usuario)
              Axios.post('/api/post-credentials', datos)
              .then(response => {
                  console.log('todo bien');
              })
        }
    }
}
</script>

<style lang="scss" scoped>
.btn {
    width: 245px;
}
</style>
