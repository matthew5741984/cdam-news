<template></template>

<script>
export default {
  mounted() {
    var mouseWheel = document.getElementsByClassName("mouse-wheel");
    var ftcoSection = document.getElementsByClassName("ftco-section");
    mouseWheel[0].addEventListener("click", function () {
      ftcoSection[0].scrollIntoView();
    });
  },
};
</script>
