<template>
    <div class="grid grid-cols-6 gap-4">
        <div v-for="item in source">
            <p class="font-medium text-gray-500 text-lg">
                {{ convertToTitleCase(item.title) }}
            </p>
            <p class="font-semibold text-xl">
                {{ item.value }}
            </p>
        </div>
    </div>
</template>


<script setup>
const props = defineProps({
    source: {
        type: Object,
        required: true,
    },
});

function convertToTitleCase(originalString) {
    if (originalString) {
        //     const title =  str.replace(/\b\w/g, match => match.toUpperCase());
        //    const converted = title.replace(/_/g, ' ');
        //     return converted
        const convertedString = originalString
            .split('_')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
            return convertedString
    }
}


</script>
