<template>
  <ul class="pagination">
    <li
      v-bind:class="[{ disabled: !pagination.prev_page_url }]"
      class="page-item"
    >
      <a
        class="page-link"
        href="#"
        @click="$emit('prev-page-url')"
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
        @click="$emit('next-page-url')"
        >Next</a
      >
    </li>
  </ul>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    pagination: Object,
  },
};
</script>