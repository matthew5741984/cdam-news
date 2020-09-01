<template></template>

<script>
export default {
  mounted() {
    var dom = document.querySelectorAll(".navbar-nav .nav-item a");
    dom.forEach((element) => {
      if (element.href == window.location.href) {
        var parent = element.parentElement;
        parent.classList.add("active");
      }
    });
  },
};
</script>
