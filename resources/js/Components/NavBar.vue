<script setup>
  import { ref } from 'vue';
  import SearchIcon from './icons/SearchIcon.vue';
  import FacebookIcon from './icons/FacebookIcon.vue';
  import DiscordIcon from './icons/DiscordIcon.vue';
  import TwitterIcon from './icons/TwitterIcon.vue';
  import BurgerIcon from './icons/BurgerIcon.vue';

  const visibleBurger = ref(null);

  const toggleBurger = (burgerMenu) => {
    visibleBurger.value = visibleBurger.value === burgerMenu ? null : burgerMenu
    // console.log(visibleBurger.value);
  }
</script>

<template>
  <nav class="text-white re">
    <div class="max-w-full py-8 sm:px-6 lg:px-8">
      <div class="flex items-center h-7">
        <!-- burger -->
        <div class="mr-5 group flex items-center">
          <button class="transition duration-300 group-hover:scale-110" @click="toggleBurger('burgerMenu')">
            <BurgerIcon />
          </button>
          <div
            v-bind:class="['burgerMenu transition-all duration-100 absolute left-[40px] top-[65px] w-[350px] p-2 bg-slate-200 rounded-2xl flex flex-col z-50 text-black',
            visibleBurger ? 'opacity-100 scale-100' : 'opacity-0 scale-90 pointer-events-none']
          ">
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-2xl w-full">Home</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">Most Popular</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">Movies</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">Tv Series</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">OVAs</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">ONAs</span>
            <span class="transition-all duration-100 font-mono text-lg py-3 pl-5 hover:bg-slate-400 hover:rounded-xl w-full">Specials</span>
          </div>
        </div>
        <a :href="route('test')" class="text-2xl font-mono">YepoAn!me
        </a>
        <div class="mx-5 rounded-xl flex items-center px-2 bg-white">
          <input class="text-black focus:outline-none border-none" type="text" name="search" id="search" placeholder="Search anime...">
            <button class="ml-3">
              <SearchIcon />
            </button>
        </div>
        <div class="flex space-x-5 ms-auto">
          <a href="#" class="transition duration-300 hover:scale-110">
              <FacebookIcon />
          </a>
          <a href="#" class="transition duration-300 hover:scale-110">
              <DiscordIcon />
          </a>
          <a href="#" class="transition duration-300 hover:scale-110">
              <TwitterIcon />
          </a>
          <div>
            <button class="transition-all duration-300 w-24 h-8 font-bold font-mono bg-slate-400 rounded-md hover:bg-slate-600">Login</button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
