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
      >Se acerca la Primavera, y queremos festejarlo con ustedes!
Para participar, deberán mandarnos una "selfie" con sus compañeros al whatsapp 011-4199-8282, aclarando nombre apellido y número de legajo de quien la envía.
La selfie más original será la ganadora, y habrá premios para todos los integrantes de la misma!!! (*) <br>
Mucha suerte!!! <br><br><br>
(*) Hasta 10 personas por foto
</span>
    </div>
    </div>
</template>

<script>
export default {
    name: 'Concurso Selfie',
    mounted () {
        this.$store.commit('login', false)
        this.$store.commit("paginaPrincipal", false);
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

@media (max-width: 600px) {

}

</style>

