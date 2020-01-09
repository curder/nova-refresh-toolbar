<template>
  <div class="flex w-full justify-end items-center mx-3">
    <button
      v-if="canReload"
      class="text-center btn btn-primary btn-default flex items-center justify-center"
      @click="reloadResources"
      :disabled="processing"
    >
      <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M14.66 15.66A8 8 0 1117 10h-2a6 6 0 10-1.76 4.24l1.42 1.42zM12 10h8l-4 4-4-4z" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: ["resourceName"],

  data() {
    return {
      processing: false
    };
  },

  computed: {
    canReload() {
      return window.config.customIndexRefreshToolbar.includes(
        this.resourceName
      );
    }
  },

  methods: {
    async reloadResources() {
      if (this.resourceName) {
        this.processing = true; // 开始

        let filters_backup = _.cloneDeep(
          this.$store.getters[`${this.resourceName}/filters`]
        );
        let filters_to_change = _.cloneDeep(filters_backup);
        filters_to_change.push({});
        let a = await this.$store.commit(
          `${this.resourceName}/storeFilters`,
          filters_to_change
        );

        await this.$store.commit(
          `${this.resourceName}/storeFilters`,
          filters_backup
        );

        setTimeout(() => {
          this.processing = false; // 结束
        }, 600);
      }
    }
  }
};
</script>

<style>
.reload-resource {
  position: absolute;
  right: 0;
  margin-right: 10rem;
}
</style>
