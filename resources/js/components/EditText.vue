<template>
  <div class="edit-text">
    <textarea name="" cols="30" rows="10" @input="$emit('input',  $event.target.value)">{{ longtext }}</textarea>
  </div>    
</template>

<script>
  export default {
    props: ['longtext'],
  }
</script>
