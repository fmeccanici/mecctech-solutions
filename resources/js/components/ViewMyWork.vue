<template>
    <div :key="locale" class="m-auto flex flex-col items-center">
        <img class="w-80 md:w-96" src="images/Mecctech_Solutions.png" alt="">
        <h1 class="text-2xl md:text-4xl pb-28 mt-5 mr-4">{{ $lang.get('home.e_commerce') }}</h1>

        <p class="text-3xl md:text-5xl">{{ $lang.get('home.hi') }} <span class="text-mecctech-red font-bold">Floris Meccanici</span>.</p>
        <p class="text-xl md:text-3xl mt-3">{{ $lang.get('home.i_am') }}</p>
        <button @click="scrollToPortfolio" class="btn view-my-work-btn mt-24 text-2xl">{{ $lang.get('home.view_my_work') }}</button>
    </div>
</template>

<script>

export default {
        mounted() {

        },
        computed: {
            locale() {
                return this.$store.state.locale
            }
        },
        methods : {
            scrollToPortfolio()
            {
                let el = document.getElementById('projects');
                el.scrollIntoView();
            }

        }
    }
</script>
