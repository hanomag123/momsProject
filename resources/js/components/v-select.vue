<template >
  <div class="custom-select w-full"
  @click="showMobileMenu = !showMobileMenu">
    <div class="select-selected" :class="{ 'select-arrow-active': showMobileMenu }" >{{ selected }}</div>
    <div class="select-items" :class="{ 'select-hide': !showMobileMenu }">
      <div
      v-for="option in options"
      :key="option.value"
      @click="selectOption(option)">
      {{ option.name }}
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'v-select',
  data: function () {
    return {
      showMobileMenu: false,
    }
  },
  props: {
    selected: {
      type: String,
      default: '',
    },
    options: {
      type: Array,
      default() {
        return [];
      }
    }
  },
  methods: {
    selectOption(option) {
      this.$emit('select', option)
    }
  }

}
</script>
<style></style>