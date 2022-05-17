<template>
  <div>
    <h3>{{ product.name }}</h3>
    <p>{{ product.category.name }}</p>
    <p>{{ product.sku }}</p>
    <p>{{ product.quantity }}</p>
    <p>{{ product.price }}</p>
    <hr />
    <div class="d-flex">
      <button
        @click="$emit('edit-product', product.id)"
        class="btn btn-warning m-2"
      >
        Edit
      </button>
      <button
        @click="$emit('delete-product', product.id)"
        class="btn btn-danger m-2"
      >
        Delete
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Product",
  props: {
    product: Object,
  },
};
</script>