<template>
  <div>
    <Key/>
    <GrapherList/>
  </div>
</template>


<script>
import Key from '../components/Key.vue'
import GrapherList from '../components/GrapherList.vue'

export default {
  components: {
    Key,
    GrapherList,
  },
  data () {
    return {
      bottomNav: 'recent',
    }
  },
}


</script>