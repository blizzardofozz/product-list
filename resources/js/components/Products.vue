<template>
  <div>
    <h2 class="fs-4">Products</h2>
    <div
      class="card card-body mb-2"
      :key="product.id"
      v-for="product in products"
    >
      <Product
        @edit-product="$emit('edit-product', product.id)"
        @delete-product="$emit('delete-product', product.id)"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
import Product from "./Product";

export default {
  name: "Products",
  props: {
    products: Array,
  },
  components: {
    Product,
  },
  emits: ["delete-product", "edit-product"],
};
</script>
