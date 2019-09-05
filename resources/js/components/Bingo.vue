<template>
    <div class="contenedor mt-3">
        <div class="max-container no-gutters">
            <div class="main-banner">
                <img src="./img/bingo.jpg" class="main-foto" alt="" srcset="">
            </div>
        </div>
        <div class="copete p-3">
            <h3 class="copete-titulo">COMENZÓ EL BINGO DE LOS PROTAGONISTAS</h3>
            <h3 class="reglamento-titulo text-success p-4"> <strong> Reglamento Bingo </strong></h3>
            <div class="reglas ml-3">
                <div class="my-2"> Todos los que forman parte del Banco de la Pampa recibirán un cartón para poder participar de "El Bingo de los Protagonistas". </div>
                <div class="my-2"> Cada semana, se presentarán los "Protagonistas de la Semana".</div>
                <div class="my-2"> Quienes tengan alguno de los protagonistas en su cartón, deberán tildarlo en el círculo de la foto correspondiente. </div>
                <div class="my-2"> Las primeras 9 personas que completen su cartón y envíen un mail con el número de serie que figura en el mismo a contacto@60aniversario.com.ar con el asunto SOY GANADOR DEL BINGO, serán los ganadores.  </div>
                <div class="my-2"> Se irán publicando los ganadores en las novedades del sitio. </div>
                <div class="my-2">Todos los que hayan participado de "El Bingo de los Protagonistas" recibirán un premio del 60° Aniversario.</div>
                <!-- <div><strong> Tienen tiempo hasta el 06/06</strong></div> -->
            </div>
        </div>
        <div class="protagonistas-titulo p-3">
            <h3> <strong> Protagonistas de la semana del 2 al 6 de Septiembre</strong></h3>
        </div>
        <div class="protagonistas-fotos p-3" >
            <div class="inner-container no-gutters">
                <div class="contenedor-general-fotos  text-center">
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo/semana10/10-1.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo/semana10/10-2.jpg" alt="" srcset="">
                    </div>
                </div>
                <div class="contenedor-general-fotos-mobile">
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo/semana10/10-CEL1.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo/semana10/10-CEL3.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo/semana10/10-CEL2.jpg" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaNueve" aria-expanded="false" aria-controls="collapseSemanaNueve" @click="showPast9">
                <h3 class="titulo-anterior"> <strong>  Protagonistas de la semana del 26 al 31 de Agosto</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaNueve" v-if="mostrarBingo9">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9-1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9-2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9-3.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9-CEL1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9-CEL2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9CEL3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9CEL4.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana9/9CEL5.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaOcho" aria-expanded="false" aria-controls="collapseSemanaOcho" @click="showPast8">
                <h3 class="titulo-anterior"> <strong>  Protagonistas de la semana del 19 al 23 de Agosto</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaOcho" v-if="mostrarBingo8">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-3.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-CEL1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-CEL2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-CEL3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-CEL4.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana8/8-CEL5.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaSiete" aria-expanded="false" aria-controls="collapseSemanaSiete" @click="showPast7">
                <h3 class="titulo-anterior"> <strong>  Protagonistas de la semana del 12 al 16 de Agosto</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaSiete" v-if="mostrarBingo7">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-4-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL4-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL5-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL6-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana7/7-CEL7-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaSeis" aria-expanded="false" aria-controls="collapseSemanaSeis" @click="showPast6">
                <h3 class="titulo-anterior"> <strong>  Protagonistas de la semana del 05 al 09 de Agosto</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaSeis" v-if="mostrarBingo6">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-4-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-02.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-03.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-04.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-05.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana6/6-06.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaCinco" aria-expanded="false" aria-controls="collapseSemanaCinco" @click="showPast5">
                <h3 class="titulo-anterior"> <strong> Protagonistas de la semana del 29 de Julio al 02 de Agosto</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaCinco" v-if="mostrarBingo5">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5-01-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5-02-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5-03-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5-04-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL4.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL5.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL6.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana5/5CEL7.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaCuatro" aria-expanded="false" aria-controls="collapseSemanaCuatro" @click="showPast4">
                <h3 class="titulo-anterior"> <strong> Protagonistas de la semana del 22 al 26 de Julio</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaCuatro" v-if="mostrarBingo4">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL4.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL5.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL6.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana4/4-CEL7.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaTres" aria-expanded="false" aria-controls="collapseSemanaTres" @click="showPast3">
                <h3 class="titulo-anterior"> <strong> Protagonistas de la semana del 15 al 19 de Julio</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaTres" v-if="mostrarBingo3">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/3ersemana-1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/3ersemana-2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/3ersemana-3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/3ersemana-4.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL1.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL2.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL3.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL4.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL5.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL6.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/semana3/CEL7.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado my-5">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaDos" aria-expanded="false" aria-controls="collapseSemanaDos" @click="showPast2">
                <h3 class="titulo-anterior"> <strong> Protagonistas de la semana del 8 al 12 de Julio</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaDos" v-if="mostrarBingo2">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior pasado-uno text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/2-1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/2-2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/2-3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/2-4-01.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-02.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-03.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-04.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-05.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-06.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/bingo-celu/CEL-07.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-bingo-pasado">
            <div class="protagonistas-titulo anterior p-2" data-toggle="collapse" data-target="#collapseSemanaUno" aria-expanded="false" aria-controls="collapseSemanaUno" @click="showPast1">
                <h3 class="titulo-anterior"> <strong> Protagonistas de la semana del 1 al 5 de Julio</strong></h3>
            </div>
            <div class="protagonistas-fotos p-3 collapse" id="collapseSemanaUno" v-if="mostrarBingo1">
                <div class="inner-container no-gutters">
                    <div class="contenedor-general-fotos-anterior text-center">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/1-CO1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/1-CO2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/1-CO3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/bingo/1-CO4-01.jpg" alt="" srcset="">
                        </div>
                    </div><!--
                    <div class="contenedor-general-fotos-mobile">
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/CELULAR1-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/CELULAR2-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/CELULAR3-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/CELULAR4-01.jpg" alt="" srcset="">
                        </div>
                        <div class="contenedor-fotos my-3 mx-3">
                            <img src="./img/CELULAR5-01.jpg" alt="" srcset="">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Bingo',
    data() {
        return {
            mostrarBingo1: false,
            mostrarBingo2: false,
            mostrarBingo3: false,
            mostrarBingo4: false,
            mostrarBingo5: false,
            mostrarBingo6: false,
            mostrarBingo7: false,
            mostrarBingo8: false,
            mostrarBingo9: false,
        }
    },
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    },
    methods: {
        showPast1() {
            this.mostrarBingo1 = !this.mostrarBingo1
        },
        showPast2() {
            this.mostrarBingo2 = !this.mostrarBingo2
        },
        showPast3() {
            this.mostrarBingo3 = !this.mostrarBingo3
        },
        showPast4() {
            this.mostrarBingo4 = !this.mostrarBingo4
        },
        showPast5() {
            this.mostrarBingo5 = !this.mostrarBingo5
        },
        showPast6() {
            this.mostrarBingo6 = !this.mostrarBingo6
        },
        showPast7() {
            this.mostrarBingo7 = !this.mostrarBingo7
        },
        showPast8() {
            this.mostrarBingo8 = !this.mostrarBingo8
        },
        showPast9() {
            this.mostrarBingo9 = !this.mostrarBingo9
        },
    }
}
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

.copete-titulo {
    font-weight: bold;
    color: #efb607;
}

.protagonistas-titulo {
    background-color: gainsboro;
    color: #009e00;
    box-shadow: 2px 2px 8px #313131;
}

.protagonista-foto img {
    max-width: 260px;
    box-shadow: 2px 2px 16px rgb(15, 15, 15);
    border-radius: 8px;
}

.semana-texto{
    box-shadow: 2px 2px 6px #8c8a8a;
    background-color: gainsboro;
}

.reglamento-titulo {
    background-color: #dedede;
}

.contenedor-general-fotos-mobile {
    display: none;
}



@media (max-width: 940px) {
    .contenedor-general-fotos-mobile {
    display: flex;
    flex-direction: column;
    justify-content: center;
    }
    .contenedor-general-fotos {
        display: none;
    }
    .pasado-uno {
        display: none;
    }
}

.contenedor-fotos img {
    width: 75%;
}

.contenedor-bingo-pasado {
    margin-top: -1rem;
    cursor: pointer;

}

.titulo-anterior {
    margin: 0;
    font-size: 1.1rem;
}

.anterior {
    :hover {
        opacity: .8;
    }
}

</style>
