<template>
  <button @click="toggleAddProduct()" :style="{ background: color }" class="btn">
    {{ text }}
  </button>
</template>

<script>
export default {
  name: "Button",
  props: {
    text: String,
    color: String,
  },
  methods: {
    toggleAddProduct() {
      this.$emit("btn-click");
    },
  },
};
</script>
