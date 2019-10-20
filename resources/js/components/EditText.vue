<template>
  <div class="edit-text">
    <textarea name="" id="" cols="30" rows="10">{{text}}</textarea>
  </div>    
</template>

<script>
  export default {
    props: {
      text: {
        type: String,
      }
    },
  }
</script>
