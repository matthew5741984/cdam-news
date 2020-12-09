<template>
  <table class="table table-top-countries">
    <loading loader="bars" :active.sync="isLoading" :is-full-page="isfullPage"></loading>
    <div class="blank-page" v-if="blankPage"></div>
    <tbody v-else>
      <tr>
        <td>Station</td>
        <td class="text-right">Level(m)</td>
      </tr>
      <tr v-for="(station, index) in stations" :key="index">
        <td>{{ station[0]['StationName'] }}</td>
        <td class="text-right">{{ station[0]['WaterLevel'] }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import axios from "axios";
import Loading from "vue-loading-overlay";

export default {
  data() {
    return {
      blankPage: true,
      isLoading: false,
      isfullPage: false,
      apiPath:
        "https://1761wbb669.execute-api.eu-west-2.amazonaws.com/dev/other_stations",
      stations: "",
    };
  },
  created() {
    this.tableLoader();
  },
  components: {
    Loading,
  },
  mounted() {
    axios.get(this.apiPath).then((response) => (this.stations = response.data));
  },
  methods: {
    tableLoader: function () {
      this.isLoading = true;
      setTimeout(() => {
        this.blankPage = false;
        this.isLoading = false;
      }, 5000);
    },
  },
};
</script>
