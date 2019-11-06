<template>
  <div class="grapher"> 
    <div class="grapher-photos" data-photos>
      <img src="/assets/img/7.jpeg" alt="">
      <img src="/assets/img/2.jpeg" alt="">
      <img src="/assets/img/3.jpeg" alt="">
      <img src="/assets/img/4.jpeg" alt="">
    </div>
    <div class="grapher-inner">
      <div class="grapher-okmark"><img src="/assets/img/dm_ok.svg" alt=""></div>
      <div class="grapher-block flex">
        <div class="grapher-cap"><img src="/assets/img/human/1.jpg" alt=""></div>
        <div class="grapher-name">{{user.name}}</div>
      </div>
      <div class="grapher-block">
        <div class="grapher-block-title">活動場所</div>
        <p class="grapher-block-text">
          {{user.location}}
        </p>
      </div>
      <div class="grapher-block">
        <h3 class="grapher-block-title">自己紹介</h3>
        <p class="grapher-block-text">
          {{user.profile_text}}
        </p>
      </div>
      <!-- <div class="grapher-block">
        <h3 class="grapher-block-title">ジャンル</h3>
        <ul class="genre-list">
          <li><div class="genre-cap"><img src="/assets/img/genre/band.png" alt=""></div><div class="genre-name">バンド</div></li>
          <li><div class="genre-cap"><img src="/assets/img/genre/solo.png" alt=""></div><div class="genre-name">シンガー</div></li>
          <li><div class="genre-cap"><img src="/assets/img/genre/layer.png" alt=""></div><div class="genre-name">レイヤー</div></li>
        </ul>
      </div> -->
      <div class="grapher-block">
        <h3 class="grapher-block-title">機材</h3>
        <p class="grapher-block-text">
          {{user.tool}}
        </p>
      </div>
      <div class="dm-btn-wrap"><a href="twitter://user?screen_name=kzhrk0430" class="btn btn--dm">ダイレクトメッセージする</a></div>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    user: {
      type: Object,
    }
  },
}
</script>
