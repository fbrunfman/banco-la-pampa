<template>
    <div>
        <div class="contenedor">
            <div class="inner-container no-gutters">
                <div class="titulo-trivia mt-3">
                    <img src="./img/trivia2.jpg" alt="" srcset="">
                </div>
                <div class="copete p-5">
                    <h2 class="copete-pregunta mb-3">¡Jugá con tus compañeros de equipo en la trivia y participá por premios!</h2>
                    <h3 class="reglamento-titulo text-success p-4"> <strong> Reglamento Trivia </strong></h3>
                    <div class="reglas ml-3">
                        <div class="my-2"> El equipo que responda correctamente la mayor cantidad de preguntas, será el ganador de los premios! </div>
                        <div class="my-2"> Sólo podrá enviarse una sola Trivia resuelta por cada equipo, por lo tanto, deberán comunicarse y decidir quién responderá</div>
                        <div class="my-2"> La persona que responda lo hará por todo su equipo, es decir lo que TODOS DECIDAN, y ya no habrá opción para que otro lo haga </div>
                        <div class="my-2"> En caso de empate con otros equipos, ganará el primero que haya completado y enviado la Trivia. </div>
                        <div class="my-2"> Aclaración: piensen bien antes de responder, ya que, una vez enviadas sus respuestas, no podrán corregirlas! </div>
                        <!-- <div><strong> Tienen tiempo hasta el 06/06</strong></div> -->
                    </div>
                </div>
                <div class="comenzar-trivia d-flex justify-content-center" v-if="ocultarTrivia == false && mostrarTrivia == false">
                    <div class="btn btn-success boton-comenzar" @click="showTrivia" > Comenzar TRIVIA AHORA</div>
                </div>
                <div class="trivia-body" v-for="(pregunta, i) in Object.values(preguntas)" :key="i" :class="'trivia-body-' + i">
                    <div class="trivia-uno p-4 inner-container no-gutters d-flex justify-content-center my-4" v-if="ocultarTrivia == false && mostrarTrivia">
                        <div class="row no-gutters contenedor-trivia">
                            <div class="pregunta-uno col-12 d-flex justify-content-center">
                                <div class="contenedor-general d-flex justify-content-center  align-items-center p-3" :class="'contenedor-pregunta-' + i">
                                    <div class="pregunta-texto">
                                        <span class="texto-trivia">{{pregunta.pregunta}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="respuestas col-12 d-flex align-items-center"
                                >
                                <div class="respuestas-body">
                                    <div class="form-check my-4" v-for="(respuesta, j) in pregunta.respuestas" :key="j">
                                        <input v-model="userResponses[i]" type="radio" :name="'respuesta' + i " :value="respuesta.id" :id="'pregunta' + j" required>
                                        <label class="form-check-label" :for="'pregunta' + j">{{respuesta.respuesta}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning text-center" v-if="ocultarTrivia == true">
                    <div class="h2">Hola {{infoEmpleado.nombre}}, un integrante de tu equipo ya respondió las preguntas. Buena Suerte!!</div>
                </div>
                <div class="enviar text-center mb-5" v-if="ocultarTrivia == false && mostrarTrivia">
                    <button class="btn btn-success text-center my-2" data-toggle="modal" data-target="#trivia">¡Enviar respuestas!</button>
                </div>
                <div class="modal fade" id="trivia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">¿Confirmás enviar estas respuestas?</h5>
                            </div>
                            <div class="modal-body">
                                <span>Recordá que una vez realizada la trivia tu equipo no podrá volver a hacerla</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="enviarRespuestas">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade bd-example-modal-xl" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content p-2">
                        <div class="modal-body text-center">
                            <h3 class="my-2">Este jueves 13/06 comenzará la 1°Trivia</h3>
                            <h3 class="my-2">Contactate con tus compañeros de equipo para poder jugar!</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
import Axios from "axios";
import { log } from 'util';

export default {
    name: 'Trivia',
    data() {
        return {
            preguntas: [],
            userResponses: [],
            respuestasCorrectas: '',
            ocultarTrivia: false,
            mostrarTrivia: false,
            proximamente: true
        }
    },
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
        this.traerPreguntas()

    },
    computed: {
        infoEmpleado() {
            return this.$store.state.infoEmpleado
        }
    },
    watch: {
        infoEmpleado() {
            this.traerPreguntas()
        }
    },
    methods: {
        traerPreguntas() {
            var url = '/api/preguntas?mes=' + 1 /* se harcodea el mes*/ + '&hecha=' + this.infoEmpleado.equipo
            Axios.get(url)
                    .then(response => {
                        this.preguntas = response.data
                        if (this.preguntas.hecha === true) {
                            this.ocultarTrivia = true
                        }
                    })
        },
        showTrivia() {
            this.mostrarTrivia = true
        },
        enviarRespuestas() {
            if (this.infoEmpleado.equipo !== 0) {
                delete this.preguntas.hecha
                var counter = 0
                console.log(this.preguntas[0].respuestas);

                for (var i = 0; i < Object.values(this.preguntas).length; i++) {
                    var resps = this.preguntas[i].respuestas
                    if (resps.filter(respuesta => respuesta.es_correcta == 1)[0].id == this.userResponses[i]) {
                        counter++
                    }

                }
                this.respuestasCorrectas = counter
                var url = '/api/guardar-puntaje'
                Axios.post(url, {
                    equipo_id: this.infoEmpleado.equipo,
                    mes: 1, //se harcodea el mes en curso\
                    puntaje: this.respuestasCorrectas
                })
                .then(response => {
                    this.$swal('Tus respuestas fueron enviadas exitosamente')
                    $('#trivia').modal('hide')
                })

            }
            else {
                  this.$swal('Se completó la trivia exitósamente')
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.titulo-trivia img {
    width: 100vw;
}

.copete-pregunta {
    font-weight: bold;
    color: #efb607;
}

.contenedor-general {
    width: 384px;
    max-width: 384px;
    min-width: 384px;
    height: 370px;
    border-radius: 15px 60px 15px 60px;

}

.contenedor-pregunta-0 {
    background-color: #2eb92e;
    color: white;

}

.reglamento-titulo {
    background-color: #dedede;
}

.boton-comenzar {
    font-size: 32px;
    cursor: pointer;
}

.contenedor-pregunta-1 {
    background-color: #f2be00;
    color: white;
}

.contenedor-pregunta-2 {
    background-color: #7a8baa;
    color: white;
}

.contenedor-trivia {
    display: grid;
    grid-template-columns: 1fr 550px;
}

.contenedor-pregunta-3 {
    background-color: #5e5b51;
    color: white;
}

.contenedor-pregunta-4 {
    background-color: #ecdda5

}

.contenedor-pregunta-5 {
    background-color: #e44737;
    color: white;
}

.trivia-body-6 {
    display: none;
}

.texto-trivia {
    font-size: 36px;
    font-weight: bold;
}

.form-check-label {
    font-size: 17px;
}

.trivia-uno {
    background-color: #ececec;
}

.enviar button {
    font-size: 32px;
}

@media (max-width: 700px) {
    .contenedor-pregunta {
        max-width: 350px;
        min-width: 350px;
        height: 250px;
    }
    .texto-trivia {
        font-size: 20px;
        font-weight: bold;
    }

    .enviar button {
    font-size: 22px;
    }
    .contenedor-general {
    min-width: 244px;
    max-width: 356px;
    width: 266px;
    height: 227px;
    }
    .contenedor-trivia {
    display: block;
}
}

@media (max-width: 940px) {
    .contenedor-trivia {
    display: block;
}
}


input[type="radio"] {
    background-color: #ddd;
    background-image: -webkit-linear-gradient(0deg, transparent 20%, hsla(0,0%,100%,.7), transparent 80%),
                      -webkit-linear-gradient(90deg, transparent 20%, hsla(0,0%,100%,.7), transparent 80%);
    border-radius: 10px;
    box-shadow: inset 0 1px 1px hsla(0,0%,100%,.8),
                0 0 0 1px hsla(0,0%,0%,.6),
                0 2px 3px hsla(0,0%,0%,.6),
                0 4px 3px hsla(0,0%,0%,.4),
                0 6px 6px hsla(0,0%,0%,.2),
                0 10px 6px hsla(0,0%,0%,.2);
    cursor: pointer;
    display: inline-block;
    height: 20px;
    margin-right: 20px;
    position: relative;
    width: 20px;
    -webkit-appearance: none;
}
input[type="radio"]:after {
    background-color: rgb(179, 176, 176);
    border-radius: 25px;
    box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.4),
                0 1px 1px hsla(0,0%,100%,.8);
    content: '';
    display: block;
    height: 12px;
    left: 4px;
    position: relative;
    top: 4px;
    width: 12px;
}
input[type="radio"]:checked:after {
    background-color: rgb(36, 177, 26);
    box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.4),
                inset 0 2px 2px hsla(0,0%,100%,.4),
                0 1px 1px hsla(0,0%,100%,.8),
                0 0 2px 2px hsla(0,70%,70%,.4);
}


</style>
