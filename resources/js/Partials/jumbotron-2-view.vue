<template></template>

<script>
export default {
  data() {
    return {
      navigations: "",
      degree: "",
      color_1: "",
      color_2: "",
    };
  },
  created() {
    const request = axios.get("/api/navigations").then((response) => {
      this.navigations = response.data.data;
    });
  },
  mounted() {
    setTimeout(() => {
      var current_url = "/" + window.location.href.split("/")[3];
      this.navigations.forEach((element) => {
        if (element["path"] == current_url) {
          this.degree = element["degree"];
          this.color_1 = element["color_1"];
          this.color_2 = element["color_2"];
          var dom = document.querySelectorAll(".hero-wrap-custom .overlay")[0];
          dom.style.background = this.color_1;
          dom.style.background =
            "-moz-linear-gradient(" +
            this.degree +
            "deg" +
            ", " +
            this.color_1 +
            ", " +
            this.color_2 +
            ")";
          dom.style.background =
            "-webkit-gradient(" +
            "left bottom" +
            ", " +
            "right top" +
            ", " +
            "color-stop(0%," +
            this.color_1 +
            ")" +
            ", " +
            "color-stop(100%," +
            this.color_2 +
            ")" +
            ")";
          dom.style.background =
            "-webkit-linear-gradient(" +
            this.degree +
            "deg" +
            ", " +
            this.color_1 +
            ", " +
            this.color_2 +
            ")";
          dom.style.background =
            "-o-linear-gradient(" +
            this.degree +
            "deg" +
            ", " +
            this.color_1 +
            ", " +
            this.color_2 +
            ")";
          dom.style.background =
            "-ms-linear-gradient(" +
            this.degree +
            "deg" +
            ", " +
            this.color_1 +
            ", " +
            this.color_2 +
            ")";
          dom.style.background =
            "linear-gradient(" +
            this.degree +
            "deg" +
            ", " +
            this.color_1 +
            ", " +
            this.color_2 +
            ")";
          dom.style.filter =
            "progid:DXImageTransform.Microsoft.gradient( startColorstr='" +
            this.color_1 +
            "', endColorstr='" +
            this.color_2 +
            "', GradientType=1 )";
        }
      });
    }, 500);
  },
};
</script>
