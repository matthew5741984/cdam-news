<template>
  <div class="table-container">
    <loading loader="bars" :active.sync="isLoading" :is-full-page="isfullPage"></loading>
    <div class="blank-page" v-if="blankPage"></div>
    <div class="table-inner" v-else>
      <div class="station-title">
        <button>{{ tableTitle }}</button>
      </div>
      <vue-good-table
        :columns="columns"
        :rows="rows"
        @on-per-page-change="onPageChange"
        styleClass="vgt-table striped"
        :pagination-options="paginationOptions"
      ></vue-good-table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  name: "my-component",
  data: function () {
    return {
      blankPage: true,
      isLoading: false,
      isfullPage: false,
      paginationOptions: { enabled: true },
      apiPath:
        "https://1761wbb669.execute-api.eu-west-2.amazonaws.com/dev/get_reverse_data",
      tableTitle: "Three Gorges Dam",
      columns: [
        {
          label: "#",
          field: "ID",
        },
        {
          label: "Date Time",
          field: "DateTime",
        },
        {
          label: "Water Level",
          field: "WaterLevel",
          type: "number",
        },
        {
          label: "Water Flow",
          field: "WaterFlow",
        },
      ],
      rows: "",
    };
  },
  components: {
    Loading,
  },
  created() {
    this.tableLoader();
  },
  mounted() {
    axios.get(this.apiPath).then((response) => (this.rows = response.data));
  },
  methods: {
    tableLoader: function () {
      this.isLoading = true;
      setTimeout(() => {
        this.blankPage = false;
        this.isLoading = false;
      }, 2000);
    },
    onPageChange: function () {
      var dom = document.getElementsByClassName("title-1 m-b-25");
      setTimeout(() => {
        dom[0].scrollIntoView();
      }, 10);
    },
  },
};
</script>
