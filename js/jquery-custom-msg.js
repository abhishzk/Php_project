function custom_msg (title,type,msg) {
  new PNotify({
    title: title,
    type: type,
    text: msg,
    styling: 'bootstrap3',
  });
}
