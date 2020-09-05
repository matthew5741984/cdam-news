<template>
  <form class="contact100-form validate-form" @submit.prevent="submit">
    <span class="contact100-form-title">Get in Touch</span>

    <div class="wrap-input100 rs1-wrap-input100 validate-input">
      <span class="label-input100">Tell us your name *</span>
      <input
        class="input100"
        type="text"
        name="name"
        v-model="fields.name"
        placeholder="Enter your name"
      />
      <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
    </div>

    <div class="wrap-input100 rs1-wrap-input100 validate-input">
      <span class="label-input100">Enter your email *</span>
      <input
        class="input100"
        type="text"
        name="email"
        v-model="fields.email"
        placeholder="Enter your email"
      />
      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
    </div>

    <div class="wrap-input100">
      <span class="label-input100">Subject</span>
      <input
        class="input100"
        type="text"
        name="subject"
        v-model="fields.subject"
        placeholder="What's this about?"
      />
      <div v-if="errors && errors.name" class="text-danger">{{ errors.subject[0] }}</div>
    </div>

    <div class="wrap-input100 validate-input">
      <span class="label-input100">Message</span>
      <textarea
        class="input100"
        name="message"
        v-model="fields.message"
        placeholder="Your message here..."
      ></textarea>
      <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
    </div>

    <div class="container-contact100-form-btn">
      <div class="wrap-contact100-form-btn">
        <div class="contact100-form-bgbtn"></div>
        <button class="contact100-form-btn">Submit</button>
      </div>
    </div>

    <div v-if="success" class="alert alert-success mt-3">Message sent!</div>
  </form>
</template>
<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
    };
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios
          .post("/contact/submit", this.fields)
          .then((response) => {
            this.fields = {};
            this.loaded = true;
            this.success = true;
          })
          .catch((error) => {
            this.loaded = true;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            }
          });
      }
    },
  },
};
</script>
