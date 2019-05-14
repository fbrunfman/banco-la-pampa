<template>
  <div>
    <h2>{{welcome}}</h2>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'home',
  computed: {
    welcome(){
      return this.$store.getters.welcome
    }
  }
}
</script>
