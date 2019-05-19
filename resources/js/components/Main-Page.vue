<template>
  <div class="contenedor">
    <div v-if="login === false" class="contenedor-main">
        <div class="header"/>
        <div class="inner-container">
            <div class="row botones no-gutters d-flex justify-content-between">
                <div class="col-xl-3 col-12 logo d-flex flex-row justify-content-between " @click="cambiarPagina">
                    <div>
                        <router-link to="/">
                            <img class="p-3" src="./img/logo.jpg"  alt="" srcset="">
                        </router-link>
                    </div>
                    <div class="icono-logout-min d-flex align-items-center mr-2" @click="logout">
                        <img src="./img/logout2.png" alt="" srcset="">
                    </div>
                </div>
                <div class="col-xl-8 col-12 d-flex align-items-center justify-content-center nav-bar">
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
                                <router-link to="trivia">
                                    <li class="nav-item">
                                        <a class="nav-link" href=""> <strong>TRIVIA 60 ANIVERSARIO</strong></a>
                                    </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <router-link to="anecdotario">
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><strong>ANECDOTARIO</strong></a>
                                    </li>
                                </router-link>
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
                <div class="col-xl-1 icono-logout d-flex align-items-center" @click="logout">
                    <img src="./img/logout2.png" alt="" srcset="">
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
                <div class="row no-gutters justify-content-center">
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
        <div class="nodevades justify-content-center">
          <div class="inner-container no-gutters">
            <div class="row no-gutters justify-content-center">
              <div class="banner-novedad mx-4 my-2">
                <div class="titulo-novedad p-3">
                    <h3>Novedades:</h3>
                    <h5>Titulo novedad uno</h5>
                </div>
                <div class="novedad-img">
                     <img class="imagen-novedad" src="./img/anecdota.jpg" alt="" srcset="">
                </div>
                 <div class="d-flex justify-content-center p-4">
                    <button @click="activarCollapseUno" class="btn btn-primary d-md-none" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                        <span v-if="verMasUno">Ver +</span>
                        <span v-if="verMasUno === false">Esconder</span>
                    </button>
                </div>
                <div v-if="collapseOnUno" class="collapse" id="collapseExample1">
                    <div class="banner-body p-3">
                        <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit facilis saepe aperiam quos! Qui earum esse commodi nostrum explicabo molestiae vitae ratione eveniet rerum suscipit? Vero animi tempora officiis.</span>
                    </div>
                </div>
                 <div class="banner-body no-collapse  p-3">
                        <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit facilis saepe aperiam quos! Qui earum esse commodi nostrum explicabo molestiae vitae ratione eveniet rerum suscipit? Vero animi tempora officiis.</span>
                </div>
                <!-- <div class="boton-sumar justify-content-end mr-2">
                    <span class="sumar">+</span>
                </div> -->
              </div>
              <div class="banner-novedad mx-4 my-2">
                <div class="titulo-novedad p-3">
                    <h3>Novedades:</h3>
                    <h5>Titulo novedad uno</h5>
                </div>
                <div class="novedad-img">
                     <img class="imagen-novedad" src="./img/anecdota.jpg" alt="" srcset="">
                </div>
                <div class="d-flex justify-content-center p-4">
                    <button @click="activarCollapse" class="btn btn-primary d-md-none" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span v-if="verMas">Ver +</span>
                        <span v-if="verMas === false">Esconder</span>
                    </button>
                </div>
                <div v-if="collapseOn" class="collapse" id="collapseExample">
                    <div class="banner-body p-3">
                        <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit facilis saepe aperiam quos! Qui earum esse commodi nostrum explicabo molestiae vitae ratione eveniet rerum suscipit? Vero animi tempora officiis.</span>
                    </div>
                </div>
                 <div class="banner-body no-collapse  p-3">
                        <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit facilis saepe aperiam quos! Qui earum esse commodi nostrum explicabo molestiae vitae ratione eveniet rerum suscipit? Vero animi tempora officiis.</span>
                </div>
               <!--  <div class="boton-sumar  justify-content-end mr-2">
                    <span class="sumar">+</span>
                </div> -->
              </div>
            </div>
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
            collapseOn: false,
            collapseOnUno: false,
            verMas: true,
            verMasUno: true
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
 /*    mounted() {
          this.$store.commit('paginaPrincipal', true)
    }, */
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
            this.cuenta = trueactivarCollapseactivarCollapse
        },
        activarCollapse() {
            this.collapseOn = !this.collapseOn
            this.verMas = !this.verMas
        },
         activarCollapseUno() {
            this.collapseOnUno = !this.collapseOnUno
            this.verMasUno = !this.verMasUno
        },
        logout() {
            console.log('holaaa');
            this.$store.dispatch('destroyToken')
             .then(response => {
                this.$router.push('/login')
                 this.$store.commit('login', false)
            })
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

.banner-novedad {
    width: 632px;
    height: 450px;
    border-radius: 15px 60px 15px 60px;
    background-color: rgb(212, 212, 212);
    box-shadow: 2px 2px 16px #292727;
}

.titulo-novedad {
    background-color: #4747ad;
    color: white;
    border-radius: 15px 60px 0px 0;
}

.imagen-novedad {
  height: 185px;
  width: 632px;
}

.icono-logout {
    background-color:  #ffc23a;
        :hover {
            box-shadow: 2px 2px 8px rgb(194, 194, 194);
        }
    img {
        width: 40px;
        border-radius: 50%;
        cursor: pointer;
    }
}

.icono-logout-min {
    img {
        display: none;
        width: 40px;
        cursor: pointer;
        :hover {
            opacity: 0.8;
        }
    }
}

@media (max-width: 767px) {
    .separador {
        border: none;
        height: 8px !important;
    }

    .banner-novedad {
        width: 290px;
        height: auto;
    }

    .imagen-novedad {
        width: 290px;
    }

    .no-collapse {
        display: none;
    }

}

@media (max-width: 1199px) {
    .icono-logout {
        img {
            display: none;
        }
    }
    .icono-logout-min {
        img {
            display: block;
        }
    }

}

</style>
