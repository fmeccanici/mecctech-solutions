<script setup lang="ts">
import {defineProps} from 'vue';

const props = defineProps({
    url: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
        validator: (value: string) => {
            return ['twitter', 'linkedin', 'facebook', 'instagram', 'github'].includes(value);
        },
    },
    border: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <a
        :href="url"
        class="
                    ud-w-9
                    ud-h-9
                    ud-text-2xl
                    ud-mr-3
                    ud-rounded-full
                    ud-flex
                    ud-items-center
                    ud-justify-center
                    ud-text-body-color
                    hover:ud-bg-primary
                    hover:ud-border-primary
                    hover:ud-text-white
                  "
        :class="{
            'ud-border ud-border-[#E5E8F2]': border,
        }"
        aria-label="social-link"
        name="social-link"
    >
        <i
            :class="[
                        'fa-brands',
                        {
                            'fa-twitter': type === 'twitter',
                            'fa-linkedin': type === 'linkedin',
                            'fa-facebook': type === 'facebook',
                            'fa-instagram': type === 'instagram',
                            'fa-github': type === 'github',
                        },
                    ]"
        ></i>
    </a>
</template>

<style scoped>

</style>
