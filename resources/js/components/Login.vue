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
                                <span class="mt-3 mr-4 col-10">APELLIDO</span>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <input type="text" name="apellido"  class="form-control col-10" v-model="username" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <span class="mt-3 mr-4 col-10">DNI</span>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <input type="text" name="dni"  class="form-control col-10" v-model="password" required>
                            </div>
                            <div class="text-right boton-ingresar contenedor-boton">
                                <button class="btn btn-success my-4 col-lg-4" type="submit">INGRESAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer"/>
        </div>
    </div>
</template>

<script>
import { log } from 'util';
export default {
    name: 'Login',
    data() {
        return {
            username: '',
            password: ''
        }
    },
    mounted () {
        this.$store.commit('login', true)
    },
    methods: {
        login () {
            this.$store.dispatch('retrieveToken', {
                username: this.username,
                password: this.password
            })
            .then(response => {
                this.$router.push({ name: '/'})
                 this.$store.commit('login', false)
            })
            .catch(
                alert('El usuario o la contrasena son incorrectos')
            )
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
        width: 291PX;
        height: 92px;
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
}

.login {
    width: 555px;
    height: 315px;
    background-color: #e3e3e6;
    max-width: 100%;
    max-height: 100%;
    margin-top: 40px !important;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: auto;
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
