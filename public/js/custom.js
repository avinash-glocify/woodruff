$(document).ready(function() {
  $('#dataTable').DataTable();

 const location = window.location.pathname;
 const path =location.split('/');

if(path[3] && path[3] == 'aggregation') {
  $.ajax({
    url: '/project/'+ path[2]+'/aggregation/data',
    dataType: 'json',
    beforeSend: function() {
      // setting a timeout
      html = "";
      html += `<div class="text-center"><div class="spinner-border" role="status">`;
      html += `<span class="sr-only">Loading...</span>`;
      html +=`</div></div>`;
      $('#myTable').html(html);
    },
    success: function(data) {
      $('#myTable').html(data.html);
      var table = $('#dataTableAggregate').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        "ordering": false,
        // fixedColumns:   {
          //     leftColumns: 3
          // }
        } );
      },
      error: function(e) {
        console.log(e.responseText);
      }
    });
}

  $(document).on('click', '.del-btn', function (e) {
    e.preventDefault();
    var url = $(this).data('url');

    swal({
      title: "Are you sure!",
      type: "error",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes!",
      showCancelButton: true,
    },
    function() {
      $.ajax({
        type: "delete",
        url: url,
        data: {
          _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
          swal({
            title: "Good job!",
            text: data.success,
            icon: "success",
          });
          window.location.reload();
        }
      });
    });
  });

  $('#is_admin').click(function(event){
      var val = [];
      $("#project_permissions input[type='checkbox']").each(function(ele){
        var attr = this.hasAttribute('disabled');
        if (attr) {
          this.removeAttribute('disabled');
        } else {
          this.setAttribute('disabled', true);
        }
      });
  });

});
