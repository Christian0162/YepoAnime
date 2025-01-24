<script setup>
  import { defineProps, computed } from 'vue';
  import DateIcon from './icons/DateIcon.vue';
  import TvIcon from './icons/TvIcon.vue';
  import MinuteIcon from './icons/MinuteIcon.vue';

  const props = defineProps ({
    photo: {
      type: String,
      required: true,
    },
    title: {
        type: String,
        required: true,
    },
    trending: {
        type: Number,
        required: true,
    },
    synopsis: {
        type: String,
        required: true,
    },
    id: {
        type: Number,
        required: true,
    },
  });

  const truncatedSynopsis  = computed(() => {
    const maxlength = 300;

    if(props.synopsis.length > maxlength) {
        return props.synopsis.slice(0, maxlength) + '...';
    }

    return props.synopsis;

  });
</script>

<template>
    <div class="relative ms-auto h-full w-full bg-gradient-to-r from-bg-zinc-900 justify-end p-10">
        <div class="flex justify-end items-center">
            <img
            class="object-cover h-[600px] w-[423px] rounded-xl mx-10 my-[-5]"
            :src="photo"
            alt=""
            >
        </div>
        <div
        class="absolute inset-x-0 bottom-8 left-[4rem] w-1/2 h-full flex items-center">
            <div class="text-left mx-10 space-y-8">
                <h1
                class="text-3xl font-mono font-bold text-sky-500 py-9"
                >
                Trending # {{ trending }}
                </h1>
                <h1
                class="text-3xl font-mono"
                >
                {{ title }}
                </h1>
                <div
                class="flex items-center space-x-3"
                >
                    <span>
                        <TvIcon />
                    </span>
                    <span
                    >
                    <MinuteIcon />
                    </span>
                    <span
                    >
                    <DateIcon />
                    </span>
                </div>
                <div class="flex">
                    <span
                    class="text-md font-mono"
                    >
                    {{ truncatedSynopsis  }}
                    </span>
                </div>
                <div
                    class="flex items-center space-x-5 py-5"
                    >
                    <a
                    href="#"
                    class="transition duration-300 py-3 px-5 rounded-2xl bg-violet-500 font-mono hover:bg-violet-700"
                    >
                    Watch Now!
                    </a>
                    <a
                    :href="route('detail.getAnime', {id})"
                    class="transition duration-300 py-3 px-5 rounded-2xl bg-violet-500 font-mono hover:bg-violet-700"
                    >
                    Details >
                    </a>

                </div>
            </div>
        </div>
    </div>
</template>

