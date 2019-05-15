<template>
  <div class="contenedor">
    <div v-if="login === false" class="contenedor-main">
        <div class="header"/>
        <div class="inner-container">
            <div class="row botones no-gutters">
                <div class="col-xl-3 col-12 logo " @click="cambiarPagina">
                    <router-link to="/">
                        <img class="p-3" src="./img/logo.jpg"  alt="" srcset="">
                    </router-link>
                </div>
                <div class="col-xl-9 col-12 d-flex align-items-center justify-content-center nav-bar">
                    <nav class="navbar navbar-expand-md sticky-top navbar-light">
                        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapse_target">
                            <ul class="navbar-nav">
                                <router-link to="bingo">
                                <li class="nav-item">
                                    <a class="nav-link" href=""><strong>EL BINGO DE LOS PROTAGONISTAS</strong> </a>
                                </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <li class="nav-item">
                                    <a class="nav-link" href=""> <strong>TRIVIA 60 ANIVERSARIO</strong></a>
                                </li>
                                <div class="separador mx-1"/>
                                <li class="nav-item">
                                    <a class="nav-link" href=""><strong>ANECDOTARIO</strong></a>
                                </li>
                                <div class="separador mx-1"/>
                                <li class="nav-item">
                                    <a class="nav-link" href=""> <strong>  TU FOTO CUENTA</strong></a>
                                </li>
                                <div class="separador mx-1"/>
                                <li class="nav-item">
                                    <a class="nav-link" href=""> <strong>CONCURSO SELFIE</strong> </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div v-if="paginaPrincipal && login === false ">
        <div class="fotos">
            <div class="main-foto" v-if="bingo">
                <img src="./img/bingo-2.jpg" alt="" srcset="">
            </div>
            <div class="main-foto" v-if="trivia">
                <img src="./img/bingo.jpg" alt="" srcset="">
            </div>
            <div class="main-foto" v-if="anecdotario">
                <img src="./img/bingo-2.jpg" alt="" srcset="">
            </div>
            <div class="main-foto" v-if="cuenta">
                <img src="./img/bingo-2.jpg" alt="" srcset="">
            </div>
        </div>
        <div class="banners my-5 d-flex justify-content-center">
            <div class="inner-container no-gutters">
                <div class="row no-gutters">
                    <div class="banner mx-4 my-2" @click="selectBingo">
                        <div class="banner-titulo-bingo">
                            <h3>El bingo de los protagonistas</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/bingo-3.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Conoce a los protagonistas de la semana</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="banner mx-4 my-2" @click="selectTrivia">
                        <div class="banner-titulo-trivia"  >
                            <h3>Trivia <br> 60 Aniversario</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/trivia.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Conoce a los protagonistas de la semana</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar">+</span>
                            </div>
                        </div>
                    </div>
                     <div class="banner mx-4 my-2"  @click="selectAnecdotario">
                        <div class="banner-titulo-anecdotario">
                            <h3>Anecdotario</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/anecdota.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Conoce a los protagonistas de la semana</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar">+</span>
                            </div>
                        </div>
                    </div>
                     <div class="banner mx-4 my-2"  @click="selectCuenta">
                        <div class="banner-titulo-cuenta">
                            <h3>Tu foto cuenta</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/foto.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Conoce a los protagonistas de la semana</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar">+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nodevades">
            <div class="banner-novedad">
                <h2>hola</h2>
            </div>
        </div>
    </div>
    <div>
    <router-view></router-view>
    </div>

  </div>
</template>

<script>
export default {
    name: 'home',
    data() {
        return {
            bingo: false,
            trivia: false,
            anecdotario: false,
            cuenta: false,
        }
    },
    computed: {
        empleado(){
            return this.$store.state.empleado
        },
        login() {
            return this.$store.state.login
        },
        paginaPrincipal() {
            return this.$store.state.paginaPrincipal
        }
    },
    mounted() {
          this.$store.commit('paginaPrincipal', true)
    },
    methods: {
        cambiarPagina() {
            this.$store.commit('paginaPrincipal', true)
        },
        selectBingo() {
            this.bingo = true
            this.anecdotario = false
            this.trivia = false
            this.cuenta = false
        },
        selectTrivia() {
            this.bingo = false
            this.anecdotario = false
            this.trivia = true
            this.cuenta = false
        },
        selectAnecdotario() {
            this.bingo = false
            this.anecdotario = true
            this.trivia = false
            this.cuenta = false
        },
        selectCuenta() {
            this.bingo = false
            this.anecdotario = false
            this.trivia = false
            this.cuenta = true
        }

    }
}
</script>

<style lang="scss" scoped>

.logo img {
    width: 325px;
}

.nav-bar {
    background-color: #ffc23a
}

.header {
    background-color: rgb(80, 80, 80);
    height: 5vh;
    left: 0;
    right: 0;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    overflow: auto;
    box-shadow: 2px 2px 16px #757575;
}

.botones {
    box-shadow: 2px 2px 16px grey;
}

.separador {
    height: 37px;
    border: 0.5px solid #564a4a57;
}

h6 {
    font-weight: bold;
}

nav ul li a {
    color: #626262;
}

@media (max-width: 767px) {
    .separador {
        border: none;
        height: 8px !important;
    }
}

.main-foto img {
    width: 100vw;
}

.banner {

    width: 290px;
    height: 450px;
    background-color: rgb(212, 212, 212);
    box-shadow: 2px 2px 16px #292727;
    img {
        width: 288px;
    }
    border-radius: 15px 60px 15px 60px;
}

.sumar {
    font-size: 38px;
    color: #ffc23a;
    text-shadow: 2px 2px 2px #888888;
}

.banner-titulo-bingo {
    background-color: #56bf2e;
    color: white;
    padding: 20px;
    border-radius: 15px 60px 0px 0px;
    min-height: 114px;
}

.banner-titulo-trivia {
    background-color: #ffc23a;
    color: white;
    padding: 20px;
    border-radius: 15px 60px 0px 0px;
    min-height: 114px;
}

.banner-titulo-anecdotario {
    background-color: #5d5f5c;
    color: white;
    padding: 20px;
    border-radius: 15px 60px 0px 0px;
    min-height: 114px;
}

.banner-titulo-cuenta {
    background-color: #8e8e8e;
    color: white;
    padding: 20px;
    border-radius: 15px 60px 0px 0px;
    min-height: 114px;
}
.contenedor {
    overflow-x: hidden;
}


</style>
