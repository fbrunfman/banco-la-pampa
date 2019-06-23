<template>
    <div class="contenedor d-flex justify-content-center align-items-center">
        <div class="w-50 formulario-archivo">
            <div class="titulo text-center p-2">
                <h3>Subir Archivos</h3>
            </div>
            <div class="login form d-flex justify-content-center flex-column" v-if="!login">
                <div class="d-flex align-items-center my-2 justify-content-center">
                    <span class="mr-2 col-3">Usuario: </span>
                    <input type="text"  v-model="user" name="" id="" class="form-control col-6">
                </div>
                <div class="d-flex align-items-center my-2 justify-content-center">
                    <span class="mr-2 col-3">Contraseña: </span>
                    <input type="password"  v-model="password" name="" id="" class="form-control col-6">
                </div>
                <div class="boton d-flex justify-content-center my-2">
                    <button class="btn btn-secondary" @click="checkLogin">Ingresar</button>
                </div>
            </div>
            <form @submit.prevent ref="formulario" v-if="login">
                <div class="form d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Subido por (legajo): </span>
                        <input type="text" name="subido_por" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Mes: </span>
                        <input type="number" name="mes" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Seccion: </span>
                        <select name="seccion" id="" class="form-control col-6" v-model="seccion">
                            <option value="1">Anecdotario</option>
                            <option value="2">Tu Foto Cuenta</option>
                            <option value="3">Concurso selfie</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center" v-if="seccion == 1">
                        <span class="mr-2 col-3">Link: </span>
                        <input type="text" name="link" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center" v-if="seccion == 2 || seccion == 3">
                        <span class="mr-2 col-3">Subir imagen: </span>
                        <input type="file" name="archivo" id="" class="form-control col-6">
                    </div>
                    <div class="boton d-flex justify-content-center my-2" @click="subirArchivo">
                        <button class="btn btn-success">SUBIR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

/* admin_usuario = asdasd
admin_pass = asdasdasd
subido_por
mes
seccion 1 anecdotario 2 tufoto cuenta 3 concurso selfie php artisan db:seed
link (si seccion es 1)
archivo (si seccion es dos o 3 --type "file" --) */


<script>
import Axios from "axios";
export default {
    data() {
        return {
            seccion: '',
            user:'',
            password:'',
            login: false
        }
    },
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    },
    methods: {
        checkLogin() {
            if (this.user === 'admin' && this.password === 'admin') {
                this.login = true
            }
            else {
                alert('Usuario o contraseña incorrecta')
            }
        },
        subirArchivo() {
            var datos = new FormData(this.$refs.formulario)
            datos.append('username', this.user)
            datos.append('password', this.password)
            Axios.post('/api/subir-archivos', datos)
                .then(response => {
                     this.$swal('Archivo guardado')
                })
        }
    }
}


</script>

<style lang="scss" scoped>

.formulario-archivo {
    background-color: rgb(233, 232, 232);
    box-shadow: 0px 5px 10px #00000030;
    margin-top: 50px;
}

</style>
