<template>
    <div class="contenedor mt-3">
        <div class="max-container no-gutters">
            <div class="main-banner">
                <img src="./img/anecdota2.jpg" class="main-foto" alt="" srcset="">
            </div>
        </div>
        <div class="copete p-3">
            <h3 class="copete-titulo">Contanos tu anecdota mas divertida en un video</h3>
            <span class="copete-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi, itaque molestiae nostrum nisi ut consectetur, quas illum commodi provident quod blanditiis ipsa vel distinctio molestias. Laborum eum sit expedita?</span>
            <span class="copete-contacto mt-2 mb-4"> Envianos tu video a <strong><a href="mailto:"> xxxxxx@xxxxxx.com</a></strong></span>
        </div>
        <div class="protagonistas-titulo p-3">
            <h3> <strong>Dale like a las anecdotas que mas te gustan</strong></h3>
        </div>
        <div class="protagonistas-fotos p-3" >
            <div class="inner-container no-gutters">
                <div class="row no-gutters">
                    <div class="contenedor-fotos col-xl-3 col-md-6 col-12 text-center my-2" v-for="i in 9" :key="i">
                        <div class="bloque-video">
                            <div class="protagonista-foto">
                                <iframe width="300" height="255"
                                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                </iframe>
                            </div>
                            <div class="info-video d-flex justify-content-between">
                                <div class="protagonista-info text-left ml-2">
                                    <div class="nombre"><span>Jose Perez</span></div>
                                    <div class="sucursal"><span>SUCURSAL XasdadasdasdXX</span></div>
                                    <div class="sucursal"><span>Area XasdadasdasdXX</span></div>
                                </div>
                                <div class="icono-like d-flex flex-row align-items-center ml-2 mr-2">
                                    <img class="like mr-2" src="https://img.icons8.com/dusk/64/000000/facebook-like.png">
                                    <span style="font-size: 16px;">20</span>
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
export default {
    name: 'Anecdotario',
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

.like {
    width: 22px;
    cursor: pointer;
}

.info-video {
    font-size: 13px;
    background-color: #e7b912;
    color: white;
    box-shadow: 2px 2px 8px grey;
}

.bloque-video {
    display: grid;
    grid-template-columns: 298px;
}
</style>
