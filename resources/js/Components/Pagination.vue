<script setup>
  import { Link }  from '@inertiajs/vue3';
  
  defineProps({
      data: {
          type: Object,
          default: () => ({}),
      },
  });
</script>  
  
<template>
    <div v-if="data.length > 3" class="flex justify-center mt-4 space-x-4">            
      <Link
          v-for="(link, k) in data"
          :key="k"
          class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-black hover:text-white focus:text-white hover:shadow"
          :class="{'bg-lightseagreen-400 text-white font-bold': link.active}"
          :href="link.url"
          v-html="link.label"
      />
    </div>
</template>