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
            <div class="my-2 d-flex justify-content-center" data-toggle="modal" data-target="#editarUsuario">
                <div class="btn btn-warning">
                    <h3>Editar usuario</h3>
                </div>
            </div>
            <div class="my-2 d-flex justify-content-center" data-toggle="modal" data-target="#borrarUsuario">
                <div class="btn btn-danger ">
                    <h3>Borrar usuario</h3>
                </div>
            </div>
        </div>
            <form @submit.prevent ref="crearUsuario">
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
                                    <input type="date" name="fecha_de_ingreso" class="form-control col-6" id="">
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
            <form @submit.prevent ref="editarUsuario">
                <div class="modal fade bd-example-modal-xl " id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="CrearUsuario" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="resetEdit">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-flex justify-content-center" v-if="!traerUsuario">
                                <div class="d-flex justify-content-center flex-row align-items-center">
                                    <span class="mr-2">Legajo:</span>
                                    <input type="text" v-model="legajo" class="form-control col-6" id="">
                                </div>
                            </div>
                            <div class="modal-body" v-if="traerUsuario">
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Nombre:</span>
                                    </div>
                                    <input type="text" v-model="usuario.nombre" name="nombre" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Apellido:</span>
                                    </div>
                                    <input type="text" name="apellido" v-model="usuario.apellido" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Apodo:</span>
                                    </div>
                                    <input type="text" name="apodo" v-model="usuario.apodo" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Función:</span>
                                    </div>
                                    <input type="text" name="funcion" v-model="usuario.funcion" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Area:</span>
                                    </div>
                                    <input type="text" name="area" v-model="usuario.area" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Locación:</span>
                                    </div>
                                    <input type="text" name="locacion" v-model="usuario.locacion" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Email:</span>
                                    </div>
                                    <input type="text" name="correo" v-model="usuario.correo" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Fecha de ingreso:</span>
                                    </div>
                                    <input type="date" name="fecha_de_ingreso" v-model="usuario.fecha_de_ingreso" class="form-control col-6" id="">
                                </div>
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Equipo:</span>
                                    </div>
                                    <input type="text" name="equipo"  v-model="usuario.equipo" class="form-control col-6" id="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetEdit">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editarUsuario" v-if="traerUsuario">Guardar</button>
                                <button type="button" class="btn btn-primary" @click="getUser" v-if="!traerUsuario">Traer usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form  @submit.prevent ref="borrarUsuario">
                <div class="modal fade bd-example-modal-xl " id="borrarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Borrar usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center flex-row align-items-center my-2">
                                    <div class="col-2">
                                        <span class="mr-2">Legajo:</span>
                                    </div>
                                    <input type="text" name="legajo" class="form-control col-6" id="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="borrarUsuario">Borrar usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</template>

<script>
import Axios from "axios";
export default {
    name: 'EditarUsuarios',
    data () {
        return {
            user: '',
            password: '',
            legajo: '',
            logeado: false,
            traerUsuario: false,
            usuario: '',
            nombre: '',
            apellido: '',
            apodo: '',
            funcion: '',
            area: '',
            locacion: '',
            correo: '',
            fecha_de_ingreso: '',
            equipo: ''
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
        resetEdit() {
            this.traerUsuario = false
        },
        crearUsuario() {
              var datos = new FormData(this.$refs.crearUsuario)
              datos.append('user', this.user)
              datos.append('password', this.password)
              Axios.post('/api/crear-usuario', datos)
              .then(response => {
                  alert('Usuario ingresado correctamente')
              })
                .catch((error) => {
                alert('Ocurrio un error')
            })
        },
        editarUsuario() {
            var datos = new FormData(this.$refs.editarUsuario)
            datos.append('user', this.user)
            datos.append('password', this.password)
            datos.append('legajo', this.legajo)
            Axios.post('/api/editar-usuario', datos)
            .then(response => {
                alert('Usuario editado correctamente')
                this.traerUsuario = false
            })
        },
        getUser() {
            var datos = new FormData(this.$refs.editarUsuario)
            datos.append('user', this.user)
            datos.append('password', this.password)
            datos.append('legajo', this.legajo)
            Axios.post('/api/traer-usuario', datos)
            .then(response => {
                console.log('todo bien');
                this.traerUsuario = true
                this.usuario = response.data
            })
        },
        borrarUsuario() {
            var datos = new FormData(this.$refs.borrarUsuario)
            datos.append('user', this.user)
            datos.append('password', this.password)
            Axios.post('/api/borrar-usuario', datos)
            .then(response => {
                alert('Usuario borrado correctamente')
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
