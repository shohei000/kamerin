<template>
  <div class="photo">
    <figure class="photo__wrapper">
      <img
        class="photo__image"
        :class="imageClass"
        :src="'/storage/' + user.id + '/' + photo.filename"
        @load="setAspectRatio"
        ref="image"
      >
    </figure>
  </div>
</template>

<script>
export default {
  props: {
    photo: {
      type: Object,
      required: true
    },
    user: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      landscape: false,
      portrait: false
    }
  },
  computed: {
    imageClass () {
      return {
        // 横長クラス
        'photo__image--landscape': this.landscape,
        // 縦長クラス
        'photo__image--portrait': this.portrait
      }
    }
  },
  methods: {
    setAspectRatio () {
      if (! this.$refs.image) {
        return false
      }
      const height = this.$refs.image.clientHeight
      const width = this.$refs.image.clientWidth
      // 縦横比率 3:4 よりも横長の画像
      this.landscape = height / width <= 0.75
      // 横長でなければ縦長
      this.portrait = ! this.landscape
    },
    like () {
      this.$emit('like', {
        id: this.item.id,
        liked: this.item.liked_by_user
      })
    }
  },
  watch: {
    $route () {
      // ページが切り替わってから画像が読み込まれるまでの間に
      // 前のページの同じ位置にあった画像の表示が残ってしまうことを防ぐ
      this.landscape = false
      this.portrait = false
    }
  }
}
</script>
