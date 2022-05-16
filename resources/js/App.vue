<template>
  <Navbar />
  <div class="container">
    <AddProduct :product="product" @add-product="addProduct" />
    <nav aria-label="Page navigation">
      <Pagination
      @next-page-url="fetchProducts(pagination.next_page_url)"
      @prev-page-url="fetchProducts(pagination.prev_page_url)"
      :pagination="pagination" />
    </nav>
    <Products
      @edit-product="editProduct"
      @delete-product="deleteProduct"
      :products="products"
    />
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
import Products from "./components/Products";
import AddProduct from "./components/AddProduct";
import Pagination from "./components/Pagination";

export default {
  name: "App",
  data() {
    return {
      product: {
        category_id: "",
        id: "",
        sku: "",
        name: "",
        quantity: "",
        price: "",
      },
      product_id: "",
      products: [],
      pagination: {},
      edit: false,
    };
  },
  components: {
    Navbar,
    Products,
    AddProduct,
    Pagination,
  },
  methods: {
    async fetchProducts(pageUrl) {
      let vm = this;
      pageUrl = (await pageUrl) || "api/products";
      const res = await fetch(pageUrl);
      const jsonObj = await res.json();
      vm.makePagination(jsonObj.meta, jsonObj.links);
      this.products = jsonObj.data;
    },
    async fetchProduct(id) {
      const res = await fetch(`api/products/${id}`);
      const data = await res.json();
      return data;
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
    async deleteProduct(id) {
      if (confirm("Are you sure?")) {
        const res = await fetch(`api/products/${id}`, { method: "DELETE" });
        res.status === 200
          ? (this.products = this.products.filter(
              (product) => product.id !== id
            ))
          : alert("Error deleting product");
      }
    },
    async editProduct(id) {
      const productToEdit = await this.fetchProduct(id);

      this.edit = true;
      this.product.id = this.product_id = productToEdit.id;
      this.product.category_id = productToEdit.category_id;
      this.product.sku = productToEdit.sku;
      this.product.name = productToEdit.name;
      this.product.quantity = productToEdit.quantity;
      this.product.price = productToEdit.price;
    },
    async addProduct(product) {
      if (this.edit === false) {
        const res = await fetch("api/products", {
          method: "POST",
          headers: {
            "Content-type": "application/json",
          },
          body: JSON.stringify(product),
        });

        // const data = await res.json();
        this.fetchProducts();
      } else {
        const res = await fetch(`api/products/${this.product_id}`, {
          method: "PUT",
          headers: {
            "Content-type": "application/json",
          },
          body: JSON.stringify(product),
        });

        const data = await res.json();

        this.product.category_id = "";
        this.product.sku = "";
        this.product.name = "";
        this.product.quantity = "";
        this.product.price = "";
        alert("Product Updated");
        this.fetchProducts();
        this.edit = false;
        this.product_id = "";
      }
    },
  },
  async created() {
    this.fetchProducts();
  },
};
</script>