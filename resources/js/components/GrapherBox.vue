<template>
  <div class="grapher-box">
    <div class="grapher-photos-wrap">
      <div class="grapher-box-photos" data-photos>
        <img src="/assets/img/1.jpeg" alt="">
        <img src="/assets/img/2.jpeg" alt="">
        <img src="/assets/img/3.jpeg" alt="">
      </div>
      <div class="dots">
        <span class="is-active"></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="grapher-box-link" v-on="on">
      <div class="grapher-box-info">
        <div class="grapher-box-name">{{ user.name }}</div>
        <div class="grapher-box-pref">神奈川県</div>
      </div>
      <span class="btn">みてみる</span>
    </div>
  </div>
</template>




<script>
  export default {
    props: {
      user: {
        type: Object,
        default: ''
      }
    }
  }
</script>
