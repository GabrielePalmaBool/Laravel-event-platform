<script>
import axios from 'axios'

export default{
  name:'EventList',
  data(){
    return{
      events: [],
    }
  },

  mounted(){
    axios.get('http://localhost:8000/api/v1/events')
    .then(res => {
      const data = res.data;
        this.events = data.events;
        console.log("events:", this.events)
    })
    .catch(err => {
      console.err(err);
    })
  },

  methods:{
    
  }
}

</script>

<template>
  <div class="text-center">
    <h1>Eventi</h1>
    <div>
      <ol>
        <li v-for="event in events" :key="event.id">
            {{ event.nome_evento }}
        </li>
      </ol>
    </div>
  </div>
</template>

<style scoped lang="scss">
</style>
