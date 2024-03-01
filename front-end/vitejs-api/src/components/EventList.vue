<script>
import axios from 'axios'

export default{
  name:'EventList',
  data(){
    return{
      events: [],
      createActive: false,
      newEvent:{
        name:''
      }
    }
  }
}

</script>

<template>
 <h1>Hello</h1>
</template>

<style scoped lang="scss">
@use "./styles/general.scss";

</style>
