<template>
  <div>
    <h3>{{ product.name }}</h3>
    <p>{{ product.category_id }}</p>
    <p>{{ product.sku }}</p>
    <p>{{ product.quantity }}</p>
    <p>{{ product.price }}</p>
    <hr />
    <button
      @click="$emit('edit-product', product.id)"
      class="btn btn-warning mb-2"
    >
      Edit
    </button>
    <button @click="$emit('delete-product', product.id)" class="btn btn-danger">
      Delete
    </button>
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