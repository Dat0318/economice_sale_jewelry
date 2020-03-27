var menu = {};
$(function() {
  menu.addMenu = function(ele) {
    main.showLoading();
    var data = main.getSerializeForm(ele);
    $.ajax({
      url: $(ele).attr('action'),
      type: 'POST',
      data: data,
      success: function(response) {
        main.hideLoading();
        main.reload();
        response = $.parseJSON(response);
      },
      error: function(error) {
        main.hideLoading();
        main.reload();
      }
    });
    return false;
  }

  menu.getFormEdit = function(ele) {
    main.showLoading();
    var data = {};
    $.ajax({
      url: $(ele).attr('href'),
      type: 'GET',
      data: data,
      success: function(response) {
        main.hideLoading();
        response = $.parseJSON(response);
        if (response.status == 0) {
          main.wrapper_modal.html(response.data.html);
          $('.form_edit_menu').modal();
        } else {
          alert(response.message);
        }
      },
      error: function(error) {
        main.hideLoading();
        main.reload();
      }
    });
    return false;
  }

  menu.submitFormEdit = function(ele) {
    main.showLoading();
    var data = main.getSerializeForm(ele);
    $.ajax({
      url: $(ele).attr('action'),
      type: 'POST',
      data: data,
      success: function(response) {
        main.hideLoading();
        response = $.parseJSON(response);
        if (response.status == 0) {
          main.reload();
        } else {
          alert(response.message);
        }
      },
      error: function(error) {
        main.hideLoading();
        main.reload();
      }
    });
    return false;
  }
});