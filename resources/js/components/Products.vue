<template>
  <div>
    <h2>Products</h2>
    <!-- <AddProduct @add-product="addProduct" /> -->
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li
          v-bind:class="[{ disabled: !pagination.prev_page_url }]"
          class="page-item"
        >
          <a
            class="page-link"
            href="#"
            @click="fetchProducts(pagination.prev_page_url)"
            >Previous</a
          >
        </li>
        <li class="page-item disabled">
          <a class="page-link text-dark" href="#"
            >Page {{ pagination.current_page }} of {{ pagination.last_page }}</a
          >
        </li>
        <li
          v-bind:class="[{ disabled: !pagination.next_page_url }]"
          class="page-item"
        >
          <a
            class="page-link"
            href="#"
            @click="fetchProducts(pagination.next_page_url)"
            >Next</a
          >
        </li>
      </ul>
    </nav> -->
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

    <!-- <div
      class="card card-body mb-2"
      v-for="product in products"
      v-bind:key="product.id"
    >
      <h3>{{ product.name }}</h3>
      <p>{{ product.category_id }}</p>
      <p>{{ product.sku }}</p>
      <p>{{ product.quantity }}</p>
      <p>{{ product.price }}</p>
      <hr />
      <button @click="editProduct(product)" class="btn btn-warning mb-2">
        Edit
      </button>
      <button @click="deleteProduct(product.id)" class="btn btn-danger">
        Delete
      </button>
    </div> -->
  </div>
</template>

<script>
// import AddProduct from "./AddProduct";
import Product from "./Product";

export default {
  name: "Products",
  props: {
    products: Array,
  },
  components: {
    // AddProduct,
    Product,
  },
  emits: ["delete-product", "edit-product"],
  // data() {
  //   return {
  //     products: [],
  // product: {
  //   category_id: "",
  //   id: "",
  //   sku: "",
  //   name: "",
  //   quantity: "",
  //   price: "",
  // },
  // product_id: "",
  //     pagination: {},
  //     edit: false,
  //   };
  // },
  // created() {
  //   this.fetchProducts();
  // },
  // methods: {
  //   async fetchProducts(pageUrl) {
  //     let vm = this;
  //     pageUrl = (await pageUrl) || "api/products";
  //     const res = await fetch(pageUrl);
  //     const jsonObj = await res.json();
  //     this.products = jsonObj.data;
  //     vm.makePagination(jsonObj.meta, jsonObj.links);
  //   },
  //   async fetchProduct(id) {
  //     const res = await fetch(`api/products/${id}`);
  //     const data = await res.json();
  //     return data;
  //   },
  //   makePagination(meta, links) {
  //     let pagination = {
  //       current_page: meta.current_page,
  //       last_page: meta.last_page,
  //       next_page_url: links.next,
  //       prev_page_url: links.prev,
  //     };

  //     this.pagination = pagination;
  //   },
  //   async deleteProduct(id) {
  //     if (confirm("Are you sure?")) {
  //       const res = await fetch(`api/products/${id}`, { method: "DELETE" });
  //       res.status === 200
  //         ? (this.products = this.products.filter(
  //             (product) => product.id !== id
  //           ))
  //         : alert("Error deleting product");
  //     }
  //   },
  //   async editProduct(id) {},
  //   async addProduct(product) {
  //     const res = await fetch("api/products", {
  //       method: "POST",
  //       headers: {
  //         "Content-type": "application/json",
  //       },
  //       body: JSON.stringify(product),
  //     });

  //     const data = await res.json();
  //     console.log(data);
  //     this.products = [...this.products, data];
  //   },
  // addProduct() {
  //   if (this.edit === false) {
  //     fetch("api/products", {
  //       method: "POST",
  //       headers: {
  //         "Content-type": "application/json",
  //       },
  //       body: JSON.stringify(this.product),
  //     })
  //       .then((res) => res.json)
  //       .then((data) => {
  //         this.product.category_id = "";
  //         this.product.sku = "";
  //         this.product.name = "";
  //         this.product.quantity = "";
  //         this.product.price = "";
  //         alert("Product Added");
  //         this.fetchProducts();
  //       })
  //       .catch((err) => console.log(err));
  //   } else {
  //     fetch(`api/products/${this.product_id}`, {
  //       method: "PUT",
  //       headers: {
  //         "Content-type": "application/json",
  //       },
  //       body: JSON.stringify(this.product),
  //     })
  //       .then((res) => res.json)
  //       .then((data) => {
  //         this.product.category_id = "";
  //         this.product.sku = "";
  //         this.product.name = "";
  //         this.product.quantity = "";
  //         this.product.price = "";
  //         alert("Product Updated");
  //         this.fetchProducts();
  //         this.edit = false;
  //         this.product_id = "";
  //       })
  //       .catch((err) => console.log(err));
  //   }
  // },
  // editProduct(product) {
  //   this.edit = true;
  //   this.product.id = this.product_id = product.id;
  //   this.product.category_id = product.category_id;
  //   this.product.sku = product.sku;
  //   this.product.name = product.name;
  //   this.product.quantity = product.quantity;
  //   this.product.price = product.price;
  // },
  // },
};
</script>
