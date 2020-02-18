$(document).ready(function() {
  $('#dataTable').DataTable({
    scrollY:        "350px",
    scrollX:        true,
    scrollCollapse: true,
  });

  $('#sitemapDataTable').DataTable({
    scrollY:        "350px",
    // scrollX:        true,
    scrollCollapse: true,
  });

 const location = window.location.pathname;
 const path =location.split('/');

if(path[3]) {
  const paths = ['aggregation', 'sitemap', 'google-search-console', 'ahrefs', 'screaming-frogs', 'sem-rush'];
  if(paths.includes(path[3])) {
    const url = '/project/'+ path[2]+'/'+path[3]+'/data';
    const dataTable = '#dataTable';
    var scrollx = true;
    if(path[3] == 'sitemap') {
      scrollx = false;
    }
    setDataTable(url, dataTable, scrollx)
  }
}

  function setDataTable(url, dataTable, scrollx = true)
  {
    $.ajax({
      url: url,
      dataType: 'json',
      beforeSend: function() {
        html = "";
        html += `<div class="text-center"><div class="spinner-border" role="status">`;
        html += `<span class="sr-only">Loading...</span>`;
        html +=`</div></div>`;
        $('#myTable').html(html);
      },
      success: function(data) {
        $('#myTable').html(data.html);
        var table = $(dataTable).DataTable( {
          scrollY:        "350px",
          scrollX:        scrollx,
          scrollCollapse: true,
          "ordering": true,
          // fixedColumns:   {
          //       leftColumns: 3
          //   }
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
