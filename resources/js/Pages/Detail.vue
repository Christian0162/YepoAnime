<script setup>
    import NavBar from '@/Components/NavBar.vue';
    import AnimeCards from '@/Components/AnimeCards.vue';

    defineProps ({
        getAnime: {
            type: Object,
        },
        getRecom:{
            type: Object,
        }
    });

</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-black to-zinc-800 flex flex-col">
        <NavBar class="relative" />
        <div class="relative bottom-7 p-3">
            <div class="rounded-xl relative inset-x-0 h-[500px] bg-zinc-900 px-10 top-[3.5rem] flex items-center justify-center space-x-[5rem]">
                <div class="scale-[1.3] relative inset-x-6">
                    <!-- <AnimeCards class="rounded-xl"
                    :photo="getAnime.images.webp.image_url" /> -->
                    <img class="rounded-md" :src="getAnime.images.webp.image_url" alt="image">
                </div>
                <div class="text-left space-y-10 w-1/2 relative inset-y-3 left-7">
                    <h1 class="text-3xl font-mono text-white">{{ getAnime.title}}</h1>
                    <p class="font-mono text-md text-white">
                        {{ getAnime.synopsis.length > 500 ? getAnime.synopsis.slice(0, 500) + '...'  : '' }}
                    </p>
                    <div>
                        <div class="flex space-x-5 items-center">
                            <a :href="route('test')" class="transition duration-300 py-2 px-5 bg-violet-600 text-white font-mono text-md rounded-2xl hover:bg-violet-800">Watch now</a>
                            <a :href="route('test')" class="transition duration-300 py-2 px-5 bg-violet-600 text-white font-mono text-md rounded-2xl hover:bg-violet-800">Add to list</a>
                        </div>
                    </div>
                </div>
                <div class="text-white font-mono text-md space-y-3 border rounded-xl border-slate-400 p-4">
                    <div>
                        <span>Japanese: {{ getAnime.title_japanese }}</span>
                    </div>
                    <div>
                        <span>Synonyms: {{ getAnime.title_english }}</span>
                    </div>
                    <div>
                        <span>Aired: {{  }}</span>
                    </div>
                    <div>
                        <span>Premiered: {{  }}</span>
                    </div>
                    <div>
                        <span>Duration: {{ getAnime.duration }}</span>
                    </div>
                    <div>
                        <span>Status: {{ getAnime?.status }}</span>
                    </div>
                    <div>
                        <span>MAL Score: {{ getAnime.score }}</span>
                    </div>
                    <div class="space-x-1 text-center relative right-1 grid grid-cols-4">
                        <span>Genres: </span>
                        <div class="flex" v-for="(genre, index) in getAnime.genres" :key="index">
                             <span class="h-7 p-2 px-1 flex items-center border border-slate-500 rounded-xl">
                                {{ genre.name }}
                             </span>
                        </div>
                    </div>
                    <div>
                        <span>Studios: {{  }}</span>
                    </div>
                    <div>
                        <span>Procedure: {{  }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-[80px] my-[5rem] right-5 space-y-8">
            <span class="text-2xl font-bold tracking-wide font-mono text-sky-500">Recommended for you</span>
            <div class="grid grid-cols-5 gap-y-5">
                <div class="" v-for="recomendation in getRecom" :key="index">
                    <AnimeCards
                    :photo="recomendation.entry[0].images.webp.image_url"
                    class="scale-105"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
