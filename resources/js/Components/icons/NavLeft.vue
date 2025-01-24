<script setup>
  const props = defineProps ({
    swiper: {
      type: Object,
      require: true,
    }
  })

  const slidePrev = () => {
    if(props.swiper){
      props.swiper.slidePrev()
    }
  }
</script>

<template>
  <button class="nav-left transition-all duration-300 py-[4rem] px-3 bg-slate-500 hover:bg-slate-700 rounded-2xl"
    @click="slidePrev"
  >
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
  </svg>
  </button>
</template>
