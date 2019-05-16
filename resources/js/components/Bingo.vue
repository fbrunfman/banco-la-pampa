<template>
    <div class="contenedor">
        <div class="max-container no-gutters">
            <div class="main-banner">
                <img src="./img/bingo.jpg" class="main-foto" alt="" srcset="">
            </div>
        </div>
        <div class="copete p-3">
            <h3 class="copete-titulo">Por que no conocernos?</h3>
            <span class="copete-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi, itaque molestiae nostrum nisi ut consectetur, quas illum commodi provident quod blanditiis ipsa vel distinctio molestias. Laborum eum sit expedita?</span>
            <span class="copete-contacto mt-2 mb-4"> Envianos tu foto a <a href="mailto:"> xxxxxx@xxxxxx.com</a></span>
        </div>
        <div class="protagonistas-titulo p-3">
            <h3> <strong> Protagonistas de la semana</strong></h3>
        </div>
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
        <div class="protagonistas-titulo p-3">
            <h3> <strong> Protagonistas de las semanan anteriores</strong></h3>
        </div>
        <div class="semana-fotos" v-for="i in 10" :key="i">
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
}

.protagonista-foto img {
    max-width: 260px;
}

.semana-texto{
    background-color: gainsboro;
}
</style>
