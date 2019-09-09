<template>
    <div class="contenedor mt-3">
    <div class="max-container no-gutters">
      <div class="main-banner d-flex justify-content-center">
        <img src="./img/header-selfie.jpg" class="main-foto" alt srcset />
      </div>
    </div>
    <div class="copete p-3">
      <h3 class="copete-titulo">Concurso Selfie: Primaveral</h3>
      <span
        class="copete-body"
      >Se acerca la Primavera, y queremos festejarlo con vos!
Para participar, deberás mandarnos una "selfie" con los compañeros que quieras al whatsapp 011-4199-8282, aclarando tu nombre, apellido y número de legajo. La foto debe representar la llegada de la primavera. <br>
La selfie con más likes será la ganadora, y habrá premios para todos los integrantes de la misma!!! (*)<br>
Mucha suerte!!!
<br><br><br>
(*) Hasta 10 personas por foto.
</span>
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
                    v-if="!isToggled"
                    class="like mr-2"
                    src="https://img.icons8.com/dusk/64/000000/facebook-like.png"
                    @click=" addLike(i)"
                  />
                  <span
                    class="numero-likes"
                    data-toggle="modal"
                    :data-target="'#verLikes-' + i"
                  >{{archivo.archivo_usuarios.length}}</span>
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
                          <img v-if="!isToggled"
                            class="like mr-2"
                            src="https://img.icons8.com/dusk/64/000000/facebook-like.png"
                            @click=" addLike(i)"
                          />
                          <span
                            class="numero-likes"
                            :data-target="'#verLikes-' + i"
                          >{{archivo.archivo_usuarios.length}}</span>
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
    </div>
</template>


<script>
import Axios from "axios";

export default {
    name: 'ConcursoSelfie',
    data() {
    return {
      archivos: [],
      isToggled: false
    };
  },
  methods: {
    addLike(i) {
        this.isToggled = true
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
          .filter(archivo => archivo.seccion_id === 3);
          this.isToggled = false
      });
    }
  },
    mounted() {
        this.$store.commit('login', false)
        this.$store.commit("paginaPrincipal", false);
        this.getImg();
    },
    computed: {
        infoEmpleado() {
            return this.$store.state.infoEmpleado;
        }
  }
}
</script>
<style lang="scss" scoped>

.main-banner img {
    width: 100%;
}

.copete-titulo {
  font-weight: bold;
  color: #efb607;
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

