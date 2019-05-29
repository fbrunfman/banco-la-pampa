<template>
  <div class="contenedor">
    <div v-if="login === false" class="contenedor-main">
        <div class="header d-flex justify-content-center">
            <div class="nombre-usuario text-center btn btn-outline-warning my-1"> ¡Hola {{infoEmpleado.nombre}}, disfrutá el 60 Aniversario de tu banco!</div>

        </div>
        <div class="inner-container">
            <div class="row botones no-gutters d-flex justify-content-between">
                <div class="col-xl-3 col-12 logo d-flex flex-row justify-content-between " @click="cambiarPagina">
                    <div>
                        <router-link to="/">
                            <img class="p-3" src="./img/logo.jpg"  alt="" srcset="">
                        </router-link>
                    </div>
                    <div class="icono-logout-min d-flex align-items-center mr-5" v-if="cargando2 == false" >
                        <img src="./img/logout3.png" alt="" srcset="" @click="logout">
                        <img class="ml-2" src="./img/contrasena.jpg" alt="" srcset="" data-toggle="modal" data-target="#exampleModalCenter">
                    </div>
                    <div class="mr-5 align-items-center d-flex">
                        <div class="spinner-border text-success  cargando-min" role="status" v-if="cargando2">
                                <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-12 d-flex align-items-center justify-content-center nav-bar">
                    <nav class="navbar navbar-expand-md sticky-top navbar-light">
                        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapse_target">
                            <ul class="navbar-nav">
                                <router-link to="proximamente">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" href=""><strong>EL BINGO DE LOS PROTAGONISTAS</strong> </a>
                                    </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <router-link to="trivia">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" href=""> <strong>TRIVIA 60 ANIVERSARIO</strong></a>
                                    </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <router-link to="proximamente">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" href=""><strong>ANECDOTARIO</strong></a>
                                    </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <router-link to="proximamente">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" href=""> <strong>  TU FOTO CUENTA</strong></a>
                                    </li>
                                </router-link>
                                <div class="separador mx-1"/>
                                <router-link to="proximamente">
                                    <li class="nav-item">
                                        <a class="nav-link text-center" href=""> <strong>CONCURSO SELFIE</strong> </a>
                                    </li>
                                </router-link>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-1 icono-logout d-flex align-items-center" v-if="cargando2 == false" >
                    <img src="./img/logout3.png" alt="" srcset="" @click="logout">
                    <img  class="ml-2" src="./img/contrasena.jpg" alt="" srcset="" data-toggle="modal" data-target="#exampleModalCenter">
                </div>
                <div class="col-xl-1 align-items-center d-flex cargando2">
                    <div class="spinner-border text-success" role="status" v-if="cargando2">
                            <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="login === false && paginaPrincipal === true">
        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-warning consulta" data-toggle="modal" data-target=".bd-example-modal-lg">
                Consulta los datos de tu equipo
            </button>
        </div>
        <div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner main-foto">
                <div class="carousel-item active">
                 <img src="./img/header-1.png" alt="" srcset="">
                </div>
                <div class="carousel-item">
                  <img src="./img/header-2.png" alt="" srcset="">
                </div>
                <div class="carousel-item">
                  <img src="./img/header-3.png" alt="" srcset="">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
        <div class="banners my-5 d-flex justify-content-center">
            <div class="inner-container no-gutters">
                <div class="row no-gutters justify-content-center">
                    <div class="banner mx-4 my-2">
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

                                <span class="sumar" @click="irBingo">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="banner mx-4 my-2">
                        <div class="banner-titulo-trivia"  >
                            <h3>Trivia <br> 60 Aniversario</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/trivia.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>  Demostrá cuánto sabe tu equipo, y ganá un premio!</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar" @click="irTrivia">+</span>
                            </div>
                        </div>
                    </div>
                     <div class="banner mx-4 my-2">
                        <div class="banner-titulo-anecdotario">
                            <h3>Anecdotario</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/anecdota.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Contanos tu anécdota más divertida en un video</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar" @click="irAnecdotario">+</span>
                            </div>
                        </div>
                    </div>
                     <div class="banner mx-4 my-2">
                        <div class="banner-titulo-cuenta">
                            <h3>Tu foto cuenta</h3>
                        </div>
                        <div class="banner-img">
                            <img src="./img/foto.jpg" alt="" srcset="">
                        </div>
                        <div class="fondo-banner">
                            <div class="banner-body p-3">
                                <h5>Envianos una foto significativa por estos 60 años de historia</h5>
                            </div>
                            <div class="boton-sumar d-flex justify-content-end mr-2">
                                <span class="sumar" @click="irCuenta">+</span>
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
                    <h5>Se larga el sitio 60 Aniversario Banco De La Pampa</h5>
                </div>
                <div class="novedad-img">
                     <img class="imagen-novedad" src="./img/fuego2.jpg" alt="" srcset="">
                </div>
                 <div class="d-flex justify-content-center p-4 d-md-none">
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
                     <img class="imagen-novedad" src="./img/fuego2.jpg" alt="" srcset="">
                </div>
                <div class="d-flex justify-content-center p-4 d-md-none">
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
        <form @submit.prevent ref="formulario">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Cambiar la contrasena</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="password" class="form-control my-2" name="password-actual" id="" placeholder="Ingresar contrasena actual" required>
                            <input type="password" class="form-control my-2" name="password" id="" placeholder="Ingresar nueva contrasena" required>
                            <input type="password" class="form-control my-2" name="confirma-password" id="" placeholder="Repetir nueva contrasena" required>
                        </div>
                        <div class="modal-footer" v-if="cargando == false">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" @click="cambiarPassword" class="btn btn-success" >Cambiar contrasena</button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center" v-if="cargando">
                            <div class="spinner-border text-warning" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
         <div class="modal fade bd-example-modal-lg " id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Los datos de tu equipo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="h5">Tu equipo es el número <strong>{{infoEmpleado.equipo}}</strong> </div>
                            <div class="mt-4 h5">Los integrantes de tu equipo son:</div>
                            <div class="h6"> &#128073; {{infoEmpleado.nombre}} {{infoEmpleado.apellido}} - Área: {{infoEmpleado.area}} - Función {{infoEmpleado.funcion}}  </div>
                            <div class="h6"> &#128073; Jose Gutierrez</div>
                            <div class="h6"> &#128073; Ernesto Gonzalez</div>
                            <div class="h6"> &#128073; Pepe Gamboa</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
    <div>
    <router-view></router-view>
    </div>
    <footer class="footer-page d-flex justify-content-center p-4 bg-warning mt-4" v-if="paginaPrincipal == true && login == false">
        <div class="h4 footer-lucuma"> Lúcuma Desarrollo Web - 2019 &copy; </div>
    </footer>

  </div>
</template>

<script>
import Axios from "axios";
export default {
    name: 'home',
    data() {
        return {
            collapseOn: false,
            collapseOnUno: false,
            verMas: true,
            verMasUno: true,
            modal: false,
            cargando: false,
            cargando2: false
        }
    },
    computed: {
        infoEmpleado(){
            return this.$store.state.infoEmpleado
        },
        login() {
            return this.$store.state.login
        },
        paginaPrincipal() {
            return this.$store.state.paginaPrincipal
        },
        token() {
            return this.$store.state.token
        }
    },
    mounted() {
        if (this.$store.state.token === null) {
            this.$router.push('/login')
            this.$store.commit('paginaPrincipal', false)
            this.$store.commit('login', true)

        } else {
            this.$store.commit('infoEmpleado', JSON.parse(localStorage.getItem('infoEmpleado')))
        }
        if (this.$route.fullPath === '/login') {
            this.$store.commit('paginaPrincipal', false)
            this.$store.commit('login', true)
            this.$router.push('/login')
        }

    },
    methods: {
        cambiarPagina() {
            this.$store.commit('paginaPrincipal', true)
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
            this.cargando2 = true
            console.log('holaaa');
            this.$store.dispatch('destroyToken')
             .then(response => {
                 this.cargando2 = false
                this.$router.push('/login')
                 this.$store.commit('login', false)
            })
            .catch((error) => {
                this.cargando2 = false
            })
        },
        cambiarPassword() {
            this.cargando = true
             var datos = new FormData(this.$refs.formulario)
             Axios.post('/api/post-credentials', datos, {
                 headers: {
                     'Authorization': 'Bearer ' + this.token
                 }
             })
                .then(response => {
                   this.$swal('Se cambió la contraseña exitósamente')
                   this.cargando = false

                })
                .catch((error) => {
                    this.$swal('Error al cambiar la contraseña')
                    this.cargando = false
                })
        },
        irBingo() {
            this.$router.push('/proximamente')
        },
        irTrivia() {
            this.$router.push('/trivia')
        },
        irAnecdotario() {
            this.$router.push('/proximamente')
        },
        irCuenta() {
            this.$router.push('/proximamente')
        },

    }
}
</script>

<style lang="scss" scoped>

.logo img {
    width: 325px;
}

.nav-bar {
    background-color: #ffc23a;
    font-size: 14px;
}

.header {
    background-color: rgb(80, 80, 80);
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

.footer-page {
    position: relative;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    background-color: #efefef;
    text-align: center;
}

.banner {

    width: 250px;
    height: 415px;
    background-color: rgb(212, 212, 212);
    box-shadow: 2px 2px 16px #292727;
    img {
        width: 248px;
    }
    border-radius: 15px 60px 15px 60px;
}

.sumar {
    font-size: 38px;
    color: #ffc23a;
    text-shadow: 2px 2px 2px #888888;
    position: relative;
    bottom: 48px;
    cursor: pointer;
}

.footer-lucuma {
    font-family: 'Roboto Condensed';
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
    width: 592px;
    height: 370px;
    border-radius: 15px 60px 15px 60px;
    background-color: #d4d4d4;
    box-shadow: 2px 2px 16px #292727;
}

.titulo-novedad {
    background-color: #ece5d9;
    border-radius: 15px 60px 0px 0;
}

.imagen-novedad {
  height: 145px;
  width: 592px;
}

.icono-logout {
    background-color:  #ffc23a;
        :hover {
            box-shadow: 2px 2px 8px rgb(194, 194, 194);
        }
    img {
        width: 30px;
        cursor: pointer;
    }
}

.cargando2 {
    background-color:  #ffc23a;
}

.icono-logout-min {
    img {
        display: none;
        width: 25px;
        cursor: pointer;
        :hover {
            opacity: 0.8;
        }
    }
}

.cargando-min {
    display: none;
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
        background-color: #ffe4e4;
        border-radius: 15px;
    }

    .logo img {
        width: 270px;
    }
    .icono-logout-min {
        img {
            display: block;
            width: 24px;
        }
    }

}

@media (max-width: 600px) {
    .icono-logout-min {
        img {
            width: 18px;
        }
    }
}

@media (max-width: 1199px) {
    .icono-logout {
        img {
            display: none;
        }
    }
    .cargando-min {
        display: block;
    }
    .cargando2 {
        display: none;
    }
    .icono-logout-min {
        img {
            display: block;

        }
    }
    .nombre-usuario {
        font-size: 16px !important;
    }

}

.carousel-controls{
 position:relative;
  width:300px;
  margin:0 auto;
}

.carousel-indicators{
   top:0px;
}

.nombre-usuario {
    color: white;
    font-size: 28px;

}

.consulta {
    font-size: 27px;
    color: beige;
}
</style>
