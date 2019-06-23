<template>
    <div class="contenedor d-flex justify-content-center align-items-center">
        <div class="w-50 formulario-archivo">
            <div class="titulo text-center p-2">
                <h3>Subir Archivos</h3>
            </div>
            <form action="" ref="formulario">
                <div class="form d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Subido por (legajo): </span>
                        <input type="text" name="" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Mes: </span>
                        <input type="number" name="" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center">
                        <span class="mr-2 col-3">Seccion: </span>
                        <select name="" id="" class="form-control col-6" v-model="seccion">
                            <option value="1">Anecdotario</option>
                            <option value="2">Tu Foto Cuenta</option>
                            <option value="3">Concurso selfie</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center" v-if="seccion == 1">
                        <span class="mr-2 col-3">Link: </span>
                        <input type="text" name="" id="" class="form-control col-6">
                    </div>
                    <div class="d-flex align-items-center my-2 justify-content-center" v-if="seccion == 2 || seccion == 3">
                        <span class="mr-2 col-3">Subir imagen: </span>
                        <input type="file" name="" id="" class="form-control col-6">
                    </div>
                    <div class="boton d-flex justify-content-center my-2">
                        <button class="btn btn-success">SUBIR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

/* admin_usuario = asdasd
admin_pass = asdasdasd
subido_por
mes
seccion 1 anecdotario 2 tufoto cuenta 3 concurso selfie php artisan db:seed
link (si seccion es 1)
archivo (si seccion es dos o 3 --type "file" --) */


<script>
export default {
    data() {
        return {
            seccion: ''
        }
    },
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit('paginaPrincipal', false)
    },
}


</script>

<style lang="scss" scoped>

.formulario-archivo {
    background-color: rgb(233, 232, 232);
    box-shadow: 0px 5px 10px #00000030;
    margin-top: 50px;
}

</style>
