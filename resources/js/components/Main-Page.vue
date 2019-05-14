<template>
  <div>
    <h2>{{empleado.nombre}}</h2>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'home',
  computed: {
    empleado(){
      return this.$store.state.empleado
    }
  },
  mounted() {

  }
}
</script>
