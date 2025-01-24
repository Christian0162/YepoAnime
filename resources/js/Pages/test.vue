<script setup>
  import { ref } from 'vue';
  import NavBar from '@/Components/NavBar.vue';
  import SpotLightCard from '@/Components/SpotLightCard.vue';
  import AnimeCards from '@/Components/AnimeCards.vue';
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import { Autoplay, Pagination, Navigation } from 'swiper/modules';
  import NavRights from '@/Components/icons/NavRights.vue';
  import NavLeft from '@/Components/icons/NavLeft.vue';
  import { Head } from '@inertiajs/vue3';
  // import route from '@ziggy-js/vue3';
  import 'swiper/css';
  // import 'swiper/css/navigation';
  import 'swiper/css/pagination';
  import 'swiper/css/autoplay';

defineProps({
    response: Object,
    getAiringAnime: Object,
});

// console.log(response || 'lala');


//  const photo = [
//     "photo1.webp",
//     "photo2.webp",
//     "photo3.webp",
//     "photo4.webp",
//     "photo5.webp",
//     "photo6.webp",
//     "photo7.webp",

//  ];


  const swiperTrending = ref ({})
  const swiperTopAiring = ref ({})
  const swiperMostFav = ref ({})

  const onSwiperTrending = (swiper) => {
    swiperTrending.value = swiper;
  }
  const onSwiperTopAiring = (swiper) => {
    swiperTopAiring.value = swiper
  }
  const onSwiperMostFav = (swiper) => {
    swiperMostFav.value = swiper
  }

</script>

<template>

    <Head title="Dashboard" />
   <div class="min-h-screen bg-gradient-to-b from-zinc-950 to-zinc-800 text-white">
    <NavBar />
    <!-- SpotLightCard -->
    <Swiper
      :autoplay="{ delay: 3000 }"
      :slidesPerView="1"
      :spaceBetween="5"
      :navigation="true"
      :loop="true"
      :pagination="{
        clickable: true,
      }"
      :modules="[Autoplay, Pagination, Navigation]"
    >
    <swiper-slide v-for="anime in response" :key="anime.rank">
      <SpotLightCard
      :id="anime.mal_id"
      :synopsis="anime.synopsis"
      :title="anime.title"
      :trending="anime.rank"
      :photo="anime.images.webp.large_image_url"/>
    </swiper-slide>
    </Swiper>
    <!-- Trending -->
    <h1 class="text-white text-xl font-mono my-5 mx-[30px] mt-10">Trending</h1>
    <div class="flex justify-center items-center">
        <Swiper
          @swiper="onSwiperTrending"
          :autoplay="{ delay: 3000 }"
          :slidesPerView="5"
          :spaceBetween="5"
          :navigation="true"
          :loop="true"
          :modules="[Pagination, Navigation]"
          class="flex"
        >
        <SwiperSlide v-for="anime in response" :key="anime.mal_id">
            <div class="flex justify-center items-center">
                <AnimeCards class="scale-90" :photo="anime.images.webp.image_url"/>
            </div>
        </SwiperSlide>
        </Swiper>
        <div class="space-y-3 my-3 mx-3">
          <NavLeft :swiper="swiperTrending"/>
          <NavRights :swiper="swiperTrending" />
        </div>
    </div>
    <!-- Top Airing -->
    <h1 class="text-white text-xl font-mono my-5 mx-[30px]">Top Airing</h1>
    <div class="flex justify-center items-center">
        <Swiper
          @swiper="onSwiperTopAiring"
          :autoplay="{ delay: 3000 }"
          :slidesPerView="5"
          :spaceBetween="5"
          :loop="true"
          :modules="[Pagination, Navigation]"
          class="flex"
        >
          <SwiperSlide v-for="anime in getAiringAnime" :key="anime.mal_id">
            <div class="flex justify-center items-center">
                <AnimeCards class="scale-90" :title="anime.title" :photo="anime.images.webp.image_url"/>
            </div>
          </SwiperSlide>
        </Swiper>
        <div class="space-y-3 my-3 mx-3">
          <NavLeft :swiper="swiperTopAiring" />
          <NavRights :swiper="swiperTopAiring" />
        </div>
    </div>
    <!-- Most favorites -->
    <h1 class="text-white text-xl font-mono my-5 mx-[30px]">Most Favorites</h1>
    <div class="flex justify-center items-center">
        <Swiper
          @swiper="onSwiperMostFav"
          :autoplay="{ delay: 3000 }"
          :slidesPerView="5"
          :spaceBetween="5"
          :navigation="true"
          :loop="true"
          :modules="[Pagination, Navigation]"
          class="flex"
        >
        <SwiperSlide v-for="anime in response" :key="anime.mal_id">
            <div class="flex justify-center items-center">
                <AnimeCards class="scale-90" :photo="anime.images.webp.image_url"/>
            </div>
        </SwiperSlide>
        </Swiper>
        <div class="space-y-3 my-3 mx-3">
          <NavLeft :swiper="swiperMostFav" />
          <NavRights :swiper="swiperMostFav" />
        </div>
    </div>
  </div>
</template>
