<template>
  <div class="flex flex-wrap">
    <div class="w-full px-4">
      <CatalogList />
    </div>
  </div>
</template>
<script>
import CatalogList from "../../components/Catalog/CatalogList.vue";

export default {
  components: {
      CatalogList,
  },
};
</script>
