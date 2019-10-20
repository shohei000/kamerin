<template>
  <nav class="navbar">
    <RouterLink class="navbar__brand" to="/">
      カメリン
    </RouterLink>
  </nav>
</template>

<script>
export default {
  computed: {
    isLogin () {
      return this.$store.getters['auth/check']
    },
    username () {
      return this.$store.getters['auth/username']
    }
  }
}
</script>