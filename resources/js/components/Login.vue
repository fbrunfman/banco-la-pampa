<template>
    <div>
        <div class="login-body">
            <div class="header"/>
            <div class="page mt-5">
                <div class="logo d-flex justify-content-center mx-5  mt-5">
                    <img src="./img/logo.jpg" alt="" srcset="">
                </div>
                <div class="login">
                    <div class="header-login d-flex align-items-center ">
                        <h3 class="ml-4 text-white mt-2"> <strong>LOGIN</strong> </h3>
                    </div>
                    <div class="login-form">
                        <form @submit.prevent="login" class="formulario-body d-flex flex-column" ref="formulario">
                            <div class="d-flex justify-content-center">
                                <span class="mt-3 mr-4 col-10">LEGAJO</span>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex justify-content-center mt-2 col-10 ml-4">
                                    <input type="text" name="apellido"  class="form-control" v-model="username" required>
                                </div>
                                <div class="col-2 d-flex align-items-center question"> <img src="./img/question.png" alt="" srcset="" v-popover:legajo></div>
                            </div>
                            <popover name="legajo">
                                <div> &#128073; Ingresar el número de legajo sin puntos entre medio (Ej: 1234)</div>
                            </popover>
                            <div class="d-flex justify-content-center">
                                <span class="mt-3 mr-4 col-10">APELLIDO</span>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="d-flex justify-content-center mt-2 col-10 ml-4">
                                    <input type="password" name="dni"  class="form-control" v-model="password" required>
                                </div>
                                <div class="col-2 d-flex align-items-center question">
                                    <img src="./img/question.png" alt="" srcset="" v-popover:apellido>
                                </div>
                                <popover name="apellido">
                                    <div> &#128073; Ingresar su apellido con la inicial en mayúscula y el resto en minúscula (Ej: Perez)</div>
                                    <div> &#128073; No utilizar tildes</div>
                                    <div> &#128073; No utilizar Ñ (reemplazar por la letra N)</div>
                                </popover>
                            </div>
                            <div class="text-right boton-ingresar contenedor-boton" v-if="loginFailed == false">
                                <button class="btn btn-success my-4 col-lg-4" type="submit">INGRESAR</button>
                            </div>
                            <div class="loading d-flex justify-content-center mt-3">
                                <div class="spinner-border text-warning" role="status" v-if="loginFailed">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-page d-flex justify-content-center p-4 bg-warning mt-4">
            <div class="h4 footer-lucuma">Lúcuma Desarrollo Web - 2019 &copy; </div>
        </footer>
    </div>
</template>

<script>
import { log } from 'util';
export default {
    name: 'Login',
    data() {
        return {
            username: '',
            password: '',
            cargando: false,
            avisoApellido: false
        }
    },
    mounted () {
        this.$store.commit('login', true)
        this.$store.commit('paginaPrincipal', false)
    },
    computed: {
        loginFailed() {
            return this.$store.state.loginFailed
        }
    },
    methods: {
        login () {
            this.cargando = true
            this.$store.dispatch('retrieveToken', {
                username: this.username,
                password: this.password
            })
            .then(response => {
                this.cargando = false
                this.$router.push('/')
                 this.$store.commit('login', false)
                 this.$store.commit('paginaPrincipal', true)
                 this.$store.commit('infoEmpleado', response.data.usuario)
                 localStorage.setItem('infoEmpleado', JSON.stringify(response.data.usuario))
            })

        },
        showAvisoApellido() {
            this.avisoApellido = true
        }
    }
}
</script>


<style lang="scss" scoped>

.login-body {
    padding:0;
    margin:0;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    position: relative;
}

.footer-page {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    background-color: #efefef;
    text-align: center;
}

.footer-lucuma {
    font-family: 'Roboto Condensed';
}

.header {
    width: 65%;
    background-color: #ffba20;
    height: 5vh;
    position: fixed;
    left: 0;
    right: 0;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: auto;
    box-shadow: 2px 2px 16px #ad9999;
}

.footer {
    width: 65%;
    left: 0;
    right: 0;
    background-color: #000000;
    height: 5vh;
    position: fixed;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    bottom: 0;
    box-shadow: 2px 2px 16px #000000;
}

.question img {
    width: 25px;
}

.header-login {
    height: 7vh;
    background-color: #ffba20;
}

.logo img {
    width: 720px;
    height: 199px;
}

@media (max-width: 600px) {
    .logo img {
        width: 280px;
        height: 78px;
    }

    .footer {
        width: 100%
    }

    .header {
        width: 100%
    }

    .contenedor-boton {
        margin-left: 45px;
    }

    .question img {
        margin-left: -22px;
    }

    .footer-lucuma {
        font-size: 15px;
    }

    .footer-page {
        padding: 5px !important;
    }
}

.login {
    width: 555px;
    height: 330px;
    background-color: #e3e3e6;
    max-width: 100%;
    max-height: 100%;
    margin-top: 40px !important;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: hidden;
    box-shadow: 2px 2px 16px #d2d2d2;
    border-radius: 5px;
}

@media (max-width: 600px) {
    .login {
        width: 252px;
        height: 288px;
        overflow: hidden;
    }
}

@media (max-width: 770px) {
    .boton-ingresar {
        text-align: inherit !important;
    }
}

.page {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: auto;
}

.boton-ingresar {
    margin-right: 47px;
    margin-bottom: 0;
    button {
        margin-bottom: 0 !important;
    }
}

</style>
