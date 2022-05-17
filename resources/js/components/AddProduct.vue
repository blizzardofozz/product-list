<template>
  <form @submit="onSubmit" class="mb-3">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="mb-3">
      <select
        class="form-control"
        name="category_id"
        v-model="product.category_id"
      >
        <option disabled value="">Please select one</option>
        <option
          :key="category.id"
          v-for="category in categories"
          :value="category.id"
        >
          {{ category.name }}
        </option>
      </select>
    </div>
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Name"
        v-model="product.name"
      />
    </div>
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="SKU"
        v-model="product.sku"
      />
    </div>
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Quantity"
        v-model="product.quantity"
      />
    </div>
    <div class="mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Price"
        v-model="product.price"
      />
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
  </form>
</template>

<script>
export default {
  name: "AddProduct",
  props: {
    product: Object,
    categories: Array,
  },
  data() {
    return {
      category_id: this.product.category_id || "",
      sku: this.product.sku || "",
      name: this.product.name || "",
      quantity: this.product.quantity || "",
      price: this.product.price || "",
    };
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      if (this.product.name) {
        const editProduct = {
          category_id: this.product.category_id,
          sku: this.product.sku,
          name: this.product.name,
          quantity: this.product.quantity,
          price: this.product.price,
        };

        this.$emit("add-product", editProduct);
      } else {
        if (!this.name) {
          alert("Please add a product");
          return;
        }

        const newProduct = {
          category_id: this.category_id,
          sku: this.sku,
          name: this.name,
          quantity: this.quantity,
          price: this.price,
        };

        this.$emit("add-product", newProduct);
      }

      this.category_id = "";
      this.sku = "";
      this.name = "";
      this.quantity = "";
      this.price = "";
    },
  },
};
</script>