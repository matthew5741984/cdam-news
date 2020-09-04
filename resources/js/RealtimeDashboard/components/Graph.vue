<template>
  <div class="chart-container">
    <div class="chart-title">
      <h4>{{ graphHeading }}</h4>
      <p>{{ graphSubheading }}</p>
      <p v-if="isShow">{{ dataAs + " " + lastUpdate + " " + timeZone}}</p>
    </div>
    <div class="chart-inner">
      <loading loader="bars" :active.sync="isLoading" :is-full-page="isfullPage"></loading>
      <div class="chartdiv"></div>
    </div>
  </div>
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
export default {
  data: function () {
    return {
      graphHeading: "Three Gorges Dam Water Level",
      graphSubheading: "Water Level per Hour",
      dataAs: "Data as of",
      timeZone: "GMT+1",
      dynamodbData: "",
      currentLevel: "",
      currentFlow: "",
      isLoading: false,
      isfullPage: false,
      isShow: false,
      apiPath:
        "https://1761wbb669.execute-api.eu-west-2.amazonaws.com/dev/get_unreverse_data",
    };
  },
  components: {
    Loading,
  },
  computed: {
    lastUpdate: function () {
      if (this.dynamodbData.slice(-1)[0]) {
        return this.dynamodbData.slice(-1)[0]["DateTime"].slice(-5);
      }
      return "";
    },
  },
  created: function () {
    am4core.useTheme(am4themes_animated);
  },
  mounted() {
    axios
      .get(this.apiPath)
      .then((response) => (this.dynamodbData = response.data));
    this.isLoading = true;
    setTimeout(() => {
      let chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.paddingRight = 20;
      let lastHundredElement = [];
      let data = [];
      let previousValue;
      // get the last 100 elements of an array
      this.lastHundredElement = this.dynamodbData.slice(
        Math.max(this.dynamodbData.length - 100, 1)
      );
      for (var i = 0; i < this.lastHundredElement.length; i++) {
        let waterlevel = this.lastHundredElement[i]["WaterLevel"];
        let datetime = this.lastHundredElement[i]["DateTime"];
        if (i > 0) {
          // add color to previous data item depending on whether current value is less or more than previous value
          if (previousValue <= waterlevel) {
            data[i - 1].color = chart.colors.getIndex(0);
          } else {
            data[i - 1].color = chart.colors.getIndex(5);
          }
        }
        data.push({ date: datetime, value: waterlevel });
        previousValue = waterlevel;
      }
      chart.data = data;
      let dateAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      dateAxis.dataFields.category = "date";
      dateAxis.renderer.grid.template.location = 0;
      dateAxis.renderer.minGridDistance = 35;
      dateAxis.renderer.labels.template.fontSize = 10;
      dateAxis.renderer.labels.template.rotation = -45;
      dateAxis.renderer.maxLabelPosition = 0.95;
      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.title.text = "Water Level";
      valueAxis.tooltip.disabled = true;
      valueAxis.renderer.minWidth = 35;
      valueAxis.renderer.labels.template.fontSize = 10;
      valueAxis.renderer.axisFills.template.disabled = true;
      valueAxis.renderer.ticks.template.disabled = true;
      let series = chart.series.push(new am4charts.LineSeries());
      series.dataFields.categoryX = "date";
      series.dataFields.valueY = "value";
      series.strokeWidth = 2;
      series.tooltipText =
        "value: {valueY}, day change: {valueY.previousChange}";
      // set stroke property field
      series.propertyFields.stroke = "color";
      chart.cursor = new am4charts.XYCursor();
      let scrollbarX = new am4core.Scrollbar();
      chart.scrollbarX = scrollbarX;
      dateAxis.start = 0.77;
      dateAxis.keepSelection = true;
      this.isLoading = false;
      this.isShow = true;

      // pass data to WidgetChart
      this.currentLevel = this.dynamodbData.slice(-1)[0]["WaterLevel"];
      this.currentFlow = this.dynamodbData.slice(-1)[0]["WaterFlow"];
      this.$root.$emit("current-level", this.currentLevel);
      this.$root.$emit("current-flow", this.currentFlow);
    }, 2000);
  },
};
</script>
