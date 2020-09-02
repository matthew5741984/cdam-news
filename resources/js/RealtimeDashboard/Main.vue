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
                  <table class="table table-top-countries">
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td class="text-right">$366</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td class="text-right">$261</td>
                      </tr>
                      <tr>
                        <td>United Kingdom</td>
                        <td class="text-right">$399</td>
                      </tr>
                      <tr>
                        <td>Turkey</td>
                        <td class="text-right">$364</td>
                      </tr>
                      <tr>
                        <td>Germany</td>
                        <td class="text-right">$366</td>
                      </tr>
                      <tr>
                        <td>France</td>
                        <td class="text-right">$366</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td class="text-right">$366</td>
                      </tr>
                      <tr>
                        <td>Italy</td>
                        <td class="text-right">$639</td>
                      </tr>
                    </tbody>
                  </table>
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
export default {
  components: {
    WidgetChart,
    Graph,
    DataTable,
  },
};
</script>
