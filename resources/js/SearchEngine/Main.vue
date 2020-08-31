<template>
  <div class="sidebar-box">
    <form v-on:submit.prevent="searchPost" class="search-form">
      <div class="form-group">
        <span class="icon icon-search"></span>
        <input
          type="text"
          class="form-control"
          v-model="str"
          placeholder="Type a keyword and hit enter"
        />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      str: "",
    };
  },
  methods: {
    searchPost() {
      window.location = `/search?str=${this.str}`;
    },
  },
};
</script>
