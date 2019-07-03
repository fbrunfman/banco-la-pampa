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
            <h3> <strong> Protagonistas de la semana del 1 al 5 de Julio</strong></h3>
        </div>
        <div class="protagonistas-fotos p-3" >
            <div class="inner-container no-gutters">
                <div class="contenedor-general-fotos">
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo1foto1.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo1foto2.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo1foto3.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo1foto4.jpg" alt="" srcset="">
                    </div>
                    <div class="contenedor-fotos my-3 mx-3">
                        <img src="./img/bingo1foto5.jpg" alt="" srcset="">
                    </div>
                </div>
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
                </div>
            </div>
        </div>
       <!--  <div class="protagonistas-titulo p-3">
            <h3> <strong> Protagonistas de las semanan anteriores</strong></h3>
        </div> -->
        <!-- <div class="semana-fotos" v-for="i in 10" :key="i">
            <h5 class="my-2 semana-texto p-3"><strong>Semana 20/05</strong></h5>
            <div class="protagonistas-fotos p-3" >
                <div class="inner-container no-gutters">
                    <div class="row no-gutters">
                        <div class="contenedor-fotos col-xl-3 col-md-6 col-12 text-center my-2" v-for="i in 9" :key="i">
                            <div class="">
                                <div class="protagonista-foto">
                                    <img src="./img/protagonista.jpg" alt="" srcset="">
                                </div>
                                <div class="protagonista-info">
                                    <div class="nombre"><span>Jose Perez</span></div>
                                    <div class="sucursal"><span>SUCURSAL XXX / AREA XXXXX</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
export default {
    name: 'Bingo',
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
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
}


</style>
