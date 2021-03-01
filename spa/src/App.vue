<template class="">
  <div id="app" class="overflow-x-hidden">
    <TheNavigation />
    <router-view></router-view>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import Home from "@/views/Home.vue";
import TheNavigation from "@/components/TheNavigation.vue";

@Component({
  components: { TheNavigation, Home }
})
export default class App extends Vue {}
// import("./../assets/css/app.css");
</script>

<style lang="stylus">
@import "assets/css/app.css"
#app
  font-family "Futura PT", Avenir, Helvetica, Arial, sans-serif
  -webkit-font-smoothing antialiased
  -moz-osx-font-smoothing grayscale
  //text-align center
  //color #2c3e50
  color black
</style>
