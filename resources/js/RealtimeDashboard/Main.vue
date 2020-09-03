<template>
  <div class="main-content">
    <div class="section__content section__content--p30">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title-1">Overview</h2>
          </div>
        </div>
        <widget-chart></widget-chart>
        <div class="row">
          <div class="col-lg-12">
            <div class="au-card recent-report">
              <div class="au-card-inner">
                <graph></graph>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <h2 class="title-1 m-b-25">Daily Record</h2>
            <div class="table-responsive table--no-card m-b-40">
              <data-table></data-table>
            </div>
          </div>
          <div class="col-lg-3">
            <h2 class="title-1 m-b-25">Other Stations</h2>
            <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
              <div class="au-card-inner">
                <div class="table-responsive">
                  <other-stations></other-stations>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import WidgetChart from "./components/WidgetChart.vue";
import Graph from "./components/Graph.vue";
import DataTable from "./components/DataTable.vue";
import OtherStations from "./components/OtherStations.vue";
export default {
  components: {
    WidgetChart,
    Graph,
    DataTable,
    OtherStations,
  },
};
</script>
