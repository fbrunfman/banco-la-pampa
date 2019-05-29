<template>
    <div class="contenedor">
        <div class="inner-container no-gutters">
            <div class="titulo-trivia mt-3">
                <img src="./img/trivia2.jpg" alt="" srcset="">
            </div>
            <div class="copete p-5">
                <h2 class="copete-pregunta mb-3">Cuanto sabes sobre el banco?</h2>
                <span class="copete-texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quo animi deleniti eos est vero dolores repudiandae, sit mollitia nihil soluta. Accusamus quidem facere eveniet dolores nemo facilis! Deserunt, architecto?</span>
            </div>
            <div class="comenzar-trivia d-flex justify-content-center" v-if="ocultarTrivia == false && mostrarTrivia == false">
                <div class="btn btn-success boton-comenzar" @click="showTrivia"> ¡Comenzar trivia ahora!</div>
            </div>
            <div class="trivia-body" v-for="(pregunta, i) in Object.values(preguntas)" :key="i" :class="'trivia-body-' + i">
                <div class="trivia-uno p-4 inner-container no-gutters d-flex justify-content-center my-4" v-if="ocultarTrivia == false && mostrarTrivia">
                    <div class="row no-gutters">
                        <div class="pregunta-uno col-lg-6 col-12 d-flex justify-content-center">
                            <div class="contenedor-general d-flex justify-content-center  align-items-center p-3" :class="'contenedor-pregunta-' + i">
                                <div class="pregunta-texto">
                                    <span class="texto-trivia">{{pregunta.pregunta}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="respuestas col-lg-6 col-12 d-flex justify-content-center align-items-center"
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
                <div class="h2">Hola {{infoEmpleado.nombre}}, un integrate de tu equipo ya respondio las preguntas. Buena Suerte!!</div>
            </div>
            <div class="enviar text-center mb-5" v-if="ocultarTrivia == false && mostrarTrivia">
                <button @click="enviarRespuestas" class="btn btn-success text-center">Enviar respuestas!</button>
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
            mostrarTrivia: false
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
                this.$store.commit('paginaPrincipal', true)
                this.$router.push('/')
            })

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
    box-shadow: 2px 2px 16px #2b2a2a;
}

.contenedor-pregunta-0 {
    background-color: #2eb92e;
    color: white;

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
    font-size: 40px;
    font-weight: bold;
}

.form-check-label {
    font-size: 20px;
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
        font-size: 24px;
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
