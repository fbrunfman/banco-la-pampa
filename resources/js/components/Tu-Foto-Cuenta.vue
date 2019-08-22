<template>
  <div class="contenedor mt-3">
    <div class="max-container no-gutters">
      <div class="main-banner">
        <img src="./img/cuenta.jpg" class="main-foto" alt srcset />
      </div>
    </div>
    <div class="copete p-3">
      <h3 class="copete-titulo">Tu foto cuenta: Sumate al álbum del 60° Aniversario.</h3>
      <span
        class="copete-body"
      >Envianos una foto de tu autoría o de archivo, que te resulte significativa para estos 60 años de historia del Banco de La Pampa, junto con algún comentario sobre la misma. Contanos tu visión y lo que quieras mostrar!</span>
      <span
        class="copete-contacto mt-2 mb-4"
      >Envianos la foto y tus datos (nombre, apellido y legajo) por whatsapp al 011-4199-8282.</span>
      <span class="copete-contacto mt-2 mb-4">Las fotos con más likes serán ganadoras del premio!</span>
    </div>
    <div class="protagonistas-titulo p-3">
      <h3>
        <strong>Fotos de la semana</strong>
      </h3>
    </div>
    <div class="protagonistas-fotos p-3">
      <div class="inner-container no-gutters">
        <div class="row no-gutters d-flex justify-content-center">
          <div
            class="contenedor-fotos text-center my-2 mx-4"
            v-for="(archivo, i) in archivos"
            :key="i"
          >
            <div class="container-protagonista">
              <div class="protagonista-foto" data-toggle="modal" :data-target="'#verImg-' + i">
                <img class="foto-concurso" :src="`./archivos/${archivo.nombre}`" alt srcset />
              </div>
              <div class="info-video d-flex justify-content-between p-2">
                <div class="protagonista-info text-left ml-2 mr-2">
                  <div class="nombre">
                    <span>{{archivo.user.nombre}} {{archivo.user.apellido}}</span>
                  </div>
                  <div class="sucursal">
                    <span>AREA: {{archivo.user.area}}</span>
                  </div>
                  <div v-if="archivo.descripcion !== ''" class="sucursal">
                    <span>Descripción: {{archivo.descripcion}}</span>
                  </div>
                </div>
                <div class="icono-like d-flex flex-row align-items-center">
                  <img
                    class="like mr-2"
                    src="https://img.icons8.com/dusk/64/000000/facebook-like.png"
                    @click=" addLike(i)"
                  />
                  <span
                    class="numero-likes"
                    data-toggle="modal"
                    :data-target="'#verLikes-' + i"
                  >{{archivo.likes}}</span>
                </div>
                <div
                  class="ver-likes modal fade bd-example-modal-xl"
                  :id="'verLikes-' + i"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true"
                >
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content modal-contenedor">
                      <div class="modal-header"></div>
                      <div class="modal-body text-secondary modal-body">
                        <div
                          class="d-flex p-3"
                          v-for="(user, i) in archivo.archivo_usuarios"
                          :key="i"
                        >
                          <img
                            class="like mr-2"
                            src="https://img.icons8.com/dusk/64/000000/facebook-like.png"
                          />
                          <span>{{user.user.nombre}} {{user.user.apellido}}</span>
                          - Area: {{user.user.area}}
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="ver-img modal fade bd-example2-modal-xl"
                  :id="'verImg-' + i"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="example2ModalCenterTitle"
                  aria-hidden="true"
                >
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="contenedor-img">
                        <img
                          class="foto-concurso2"
                          style="width: 100%;"
                          :src="`./archivos/${archivo.nombre}`"
                          alt
                          srcset
                        />
                      </div>
                      <div class="descripcion-img info-video d-flex justify-content-between p-2">
                        <div class="protagonista-info text-left ml-2 mr-2">
                          <div class="nombre">
                            <span>{{archivo.user.nombre}} {{archivo.user.apellido}}</span>
                          </div>
                          <div class="sucursal">
                            <span>AREA: {{archivo.user.area}}</span>
                          </div>
                          <div v-if="archivo.descripcion !== ''" class="sucursal">
                            <span>Descripción: {{archivo.descripcion}}</span>
                          </div>
                        </div>
                        <div class="icono-like d-flex flex-row align-items-center">
                          <img
                            class="like mr-2"
                            src="https://img.icons8.com/dusk/64/000000/facebook-like.png"
                            @click=" addLike(i)"
                          />
                          <span
                            class="numero-likes"
                            :data-target="'#verLikes-' + i"
                          >{{archivo.likes}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="protagonistas-titulo p-3">
            <h3> <strong>Fotos de semanas anteriores</strong></h3>
    </div>-->
    <!-- <div class="protagonistas-titulo-anterior p-3 mt-4"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <h5> <strong>Semana 20/05 </strong></h5>
        </div>
        <div class="collapse contenedor-protagonistas"  id="collapseExample">
            <div class="protagonistas-fotos p-3 ">
                <div class="inner-container no-gutters">
                    <div class="row no-gutters">
                        <div class="contenedor-fotos col-xl-3 col-md-6 col-12 text-center my-2" v-for="i in 9" :key="i">
                            <div class="">
                                <div class="protagonista-foto" @click="selectImg(i)">
                                    <img src="./img/cuenta2.jpg" alt="" srcset=""  data-toggle="modal" data-target="#exampleModalCenter">
                                </div>
                                <div class="info-video d-flex justify-content-between mr-5">
                                    <div class="protagonista-info text-left ml-5">
                                        <div class="nombre"><span>Jose Perez</span></div>
                                        <div class="sucursal"><span>SUCURSAL XasdadasdasdXX / AREA XXXXasdasdasdasdX</span></div>
                                    </div>
                                    <div class="icono-like d-flex flex-row align-items-center">
                                        <img class="like mr-2" src="https://img.icons8.com/dusk/64/000000/facebook-like.png">
                                        <h6>20</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="./img/cuenta2.jpg" class="imagen-click" alt="" srcset="" data-toggle="modal" data-target="#exampleModalCenter">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>-->
  </div>
</template>

<script>
import Axios from "axios";

export default {
  name: "TuFotoCuenta",
  data() {
    return {
      archivos: []
    };
  },
  methods: {
    addLike(i) {
      console.log(
        this.archivos[i].archivo_usuarios.some(archivo => {
          return archivo.user_id == this.infoEmpleado.id;
        })
      );
      if (
        this.archivos[i].archivo_usuarios.some(archivo => {
          return archivo.user_id == this.infoEmpleado.id;
        })
      ) {
        this.deleteLike(i);
      } else {
        Axios.post("/api/like", {
          archivo_id: this.archivos[i].id,
          user_id: this.infoEmpleado.id
        }).then(response => {
          this.getImg();
          this.alreadyLike = true;
        });
      }
    },
    deleteLike(i) {
      Axios.post("/api/dislike", {
        archivo_id: this.archivos[i].id,
        user_id: this.infoEmpleado.id
      }).then(response => {
        this.getImg();
        this.alreadyLike = false;
      });
    },
    getImg() {
      Axios.post("/api/archivos").then(response => {
        console.log("todo bien");
        this.archivos = response.data
          .reverse()
          .filter(archivo => archivo.seccion_id === 2);
      });
    }
  },
  mounted() {
    this.$store.commit("login", false);
    this.$store.commit("paginaPrincipal", false);
    this.getImg();
  },
  computed: {
    infoEmpleado() {
      return this.$store.state.infoEmpleado;
    }
  }
};
</script>

<style lang="scss" scoped>
.main-banner img {
  width: 100vw;
}

.copete {
  display: grid;
  a {
    color: #efb607;
  }
}

.info-video {
  font-size: 15px;
  background-color: #e7b912;
  color: white;
  box-shadow: 2px 2px 8px grey;
  height: 170px;
}

.copete-titulo {
  font-weight: bold;
  color: #efb607;
}

.protagonistas-titulo {
  background-color: gainsboro;
  color: #2db72d;
  box-shadow: 2px 2px 8px #313131;
}

.protagonista-foto {
 cursor: pointer;
}

.container-protagonista {
  width: 360px;
}

img.foto-concurso {
  width: 100%;
  object-fit: cover;
  // width: 320px;
  height: 370px;
}

.semana-texto {
  box-shadow: 2px 2px 6px #8c8a8a;
  background-color: gainsboro;
}

.like {
  width: 23px;
  cursor: pointer;
}

.imagen-click {
  cursor: pointer;
  width: 100%;
}

.numero-likes {
  font-size: 16px;
  border-radius: 1000px;
  border: 2px solid white;
  padding: 6px;
  width: 38px;
  font-weight: bold;
  box-shadow: 0 5px 10px #00000085;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

@media (max-width: 500px) {
  .info-video {
    height: 260px;
  }
    .container-protagonista {
        width: 270px !important;
    }
    img.foto-concurso  {
        object-fit: fill !important;
    }
}

</style>
