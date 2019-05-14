<template>
  <div>
    <h2 v-if="this.login === false">{{empleado.nombre}}</h2>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    name: 'home',
    computed: {
        empleado(){
            return this.$store.state.empleado
        },
        login() {
            return this.$store.state.login
        }
    },
    mounted() {

    }
}
</script>
