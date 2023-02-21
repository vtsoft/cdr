<script setup>
  import { Link }  from '@inertiajs/vue3';
  
  defineProps({
      data: {
        type: Object,
        default: () => ({}),
      }
  });
</script>    
<template>
  <div v-if="data.length > 3" class="flex justify-center space-x-4">
      <div class="flex flex-wrap mt-8">
          <template v-for="(link, key) in data" :key="key">
              <div
                  v-if="link.url === null"
                  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                  v-html="link.label"
              />

              <Link
                  v-else
                  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-black hover:text-white focus:text-white hover:shadow"
                  :class="{ 'bg-lightseagreen-400 text-white font-bold': link.active}"
                  :href="link.url"
                  v-html="link.label"
              />
          </template>
      </div>
  </div>
</template>