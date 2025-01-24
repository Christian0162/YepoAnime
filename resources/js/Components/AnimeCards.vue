<script setup>
import { defineProps } from 'vue';

  defineProps ({
    photo: {
      type: String,
      require: true,
    },
    trend: {
      type: Number,
      require: true,
    },
    title: {
        type: String,
        require: true,
    },
    popular: {
        type: Number,
    },
  });
</script>

<template>
<a href="#">
  <div class="relative group transition-all duration-300 w-[250px] h-[350px] aspect-square">
    <img
    class="h-full w-full object-cover rounded-md"
    :src="photo"
    alt="cards">
    <span class="transition-all duration-300 absolute inset-0 top-0 text-3xl mx-4 my-2 font-mono font-bold opacity-0 group-hover:opacity-100">{{ trend+1 > 0 ? trend+1 : '' }}</span>
    <div class="transition-all duration-300 absolute inset-0 bg-gradient-to-t from-black from-10% opacity-0 group-hover:opacity-100"></div>

    <span class="transition-all duration-300 absolute inset-x-0 bottom-[4rem] text-xl font-mono font-bold flex justify-center opacity-0 group-hover:opacity-100">{{ title }}</span>
    <div class="flex justify-center items-center">
      <span class="transition-all duration-300 absolute inset-x-0 bottom-[2rem] flex justify-end mx-[60px] opacity-0 group-hover:opacity-100">⭐ 8.39</span>
      <span class="transition-all duration-300 absolute inset-x-0 bottom-[2rem] flex mx-[55px] opacity-0 group-hover:opacity-100">Season 2</span>
    </div>
  </div>
</a>
</template>
