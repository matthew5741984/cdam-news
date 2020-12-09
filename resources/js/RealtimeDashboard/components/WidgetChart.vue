<template>
  <div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c1">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="fas fa-tint"></i>
            </div>
            <img :src="widgetChart1" />
            <div class="text">
              <h2 v-if="isLoading">-</h2>
              <h2 v-else>{{ getCurrentLevel }}</h2>
              <span>current level</span>
            </div>
          </div>
          <div class="overview-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c2">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-upload"></i>
            </div>
            <img :src="widgetChart2" />
            <div class="text">
              <h2 v-if="isLoading">-</h2>
              <h2 v-else>{{ maximumLevel }}</h2>
              <span>maximum level</span>
            </div>
          </div>
          <div class="overview-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c3">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-alert-triangle"></i>
            </div>
            <img :src="widgetChart3" />
            <div class="text">
              <h2 v-if="isLoading">-</h2>
              <h2 v-else>{{ getRemainLevel }}</h2>
              <span>remain level</span>
            </div>
          </div>
          <div class="overview-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c4">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-swap-vertical"></i>
            </div>
            <img :src="widgetChart4" />
            <div class="text">
              <h4 v-if="isLoading">-</h4>
              <h4 v-else>In: {{ getCurrentInFlow }}</h4>
              <h4 v-if="isLoading">-</h4>
              <h4 v-else>Out: {{ getCurrentOutFlow }}</h4>
              <span>current flow</span>
            </div>
          </div>
          <div class="overview-chart-special">
            <canvas id="widgetChart4"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      getCurrentLevel: "",
      maximumLevel: 175,
      getCurrentInFlow: "",
      getCurrentOutFlow: "",
      isLoading: false,
      widgetChart1: process.env.MIX_AWS_URL + "/widgetChart/widgetChart1.png",
      widgetChart2: process.env.MIX_AWS_URL + "/widgetChart/widgetChart2.png",
      widgetChart3: process.env.MIX_AWS_URL + "/widgetChart/widgetChart3.png",
      widgetChart4: process.env.MIX_AWS_URL + "/widgetChart/widgetChart4.png",
    };
  },
  computed: {
    getRemainLevel: function () {
      if (this.getCurrentLevel != "") {
        let remainLevel = this.maximumLevel - this.getCurrentLevel;
        remainLevel = remainLevel.toFixed(2);
        return remainLevel;
      }
      return "";
    },
  },
  mounted() {
    this.isLoading = true;
    setTimeout(() => {
      this.$root.$on("current-level", (currentLevel) => {
        this.getCurrentLevel = currentLevel;
      });
      this.$root.$on("current-flow", (currentFlow) => {
        let getCurrentFlow = currentFlow.split("(入)");
        this.getCurrentInFlow = getCurrentFlow[0];
        this.getCurrentOutFlow = getCurrentFlow[1].replace("(出)", "");
      });
      this.isLoading = false;
    }, 5000);
  },
};
</script>
