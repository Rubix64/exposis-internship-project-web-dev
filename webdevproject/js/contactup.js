$("#contact").validate({
  rules: {
    website: {
      required: true,
      url: true
    }
  },
  submitHandler: function(form) {
    form.submit();
  }
 });
