<template>
  <div>
    <div class="page-bar">マイページ</div>
    

    <div id="mypage">

      <div class="grapher-cap"><img src="/assets/img/human/1.jpg" alt=""></div>
      <div class="grapher-name">よし</div>
      <v-card>
        <v-tabs>
          <v-tab>プロフィール</v-tab>
          <v-tab>作品一覧</v-tab>    
          <v-tab-item :key="1">
            <v-container fluid>
              <div class="mydata">
                <div class="mydata-title">自己紹介</div>
                <div class="mydata-content arrow">さあああああああああああ</div>
              </div>
              <div class="mydata">
                <div class="mydata-title">Twitterアカウント</div>
                <div class="mydata-content arrow">aegaergkaeri</div>
              </div>
              <div class="mydata">
                <div class="mydata-title">料金</div>
                <div class="mydata-content">
                  <v-radio-group v-model="price">
                    <v-radio :key="1" :label="`Free！`" :value="1"></v-radio>
                    <v-radio :key="2" :label="`応相談`" :value="2"></v-radio>
                  </v-radio-group>
                </div>
              </div>
              <div class="mydata mydata--dm">
                <div class="mydata-title">Twitterダイレクトメッセージ</div>
                <div class="mydata-content"><span>受け付ける</span><v-switch v-model="dm"></v-switch></div>
              </div>
              <div class="mydata">
                <div class="mydata-title">ジャンル</div>
                <div class="mydata-content">


                  <ul class="genre-list">
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: genre[0] }">
                        <v-checkbox v-model="genre[0]"></v-checkbox>
                        <img src="/assets/img/genre/band.png" alt="">
                      </div>
                      <div class="genre-name">バンド</div>
                    </li>
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: genre[1] }">
                        <v-checkbox v-model="genre[1]"></v-checkbox>
                        <img src="/assets/img/genre/solo.png" alt="">
                      </div>
                      <div class="genre-name">シンガー</div>
                    </li>
                    <li>
                      <div class="genre-cap" v-bind:class="{ active: genre[2] }">
                        <v-checkbox v-model="genre[2]"></v-checkbox>
                        <img src="/assets/img/genre/layer.png" alt="">
                      </div>
                      <div class="genre-name">レイヤー</div>
                    </li>
                  </ul>

                </div>
              </div>
              <div class="mydata">
                <div class="mydata-title">機材</div>
                <div class="mydata-content arrow">一眼レフ</div>
              </div>
            </v-container>
          </v-tab-item>
          <v-tab-item :key="2">
            <v-container fluid>
              <ul class="my-photo">
                <li><span><img src="/assets/img/1.jpeg" alt=""></span></li>
                <li><span><img src="/assets/img/2.jpeg" alt=""></span></li>
                <li><span><img src="/assets/img/3.jpeg" alt=""></span></li>
                <li><span><img src="/assets/img/4.jpeg" alt=""></span></li>
                <li><span><img src="/assets/img/5.jpeg" alt=""></span></li>
                <li><span><img src="/assets/img/6.jpeg" alt=""></span></li>
              </ul>
            </v-container>
          </v-tab-item>
        </v-tabs>
      </v-card>

    </div>
    

    
    
    
      
      
  </div>
</template>


<script>
  export default {
    data () {
      return {
        tab: null,
        tabs: 2,
        price: 1,
        genre: [true, false, false],
        dm: true,
      }
    },
  }
</script>