$(document).ready(function() {

  $('#sitemapDataTable').DataTable({
    scrollY:        "350px",
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
      var height  ="470px"
      if(path[3] == 'sitemap') {
        var table = $('#dataTable').DataTable({
          scrollY: height,
          scrollX: true,
          scrollCollapse: true,
          autoWidth: false,
          "ajax": url,
          "pageLength": 50,
          "sDom": "Rlfrtip",
          "columns": [
            { "data": "name"},
            { "data": "url" },
          ]
        });
        return true;
      }
      if(path[3] == 'aggregation') {
        var table = $('#dataTable').DataTable({
          scrollY:'430px',
          scrollX: true,
          scrollCollapse: true,
          autoWidth: false,
          "ajax": url,
          "pageLength": 50,
          "ordering": false,
          "columns": [
            { "data": "url_1" },
            { "data": "url_2" },
            { "data": "address"},
            { "data": "final_url" },
            { "data": "path" },
            { "data": "category" },
            { "data": "crawl_depth" },
            { "data": "site_url" },
            { "data": "keyword" },
            { "data": "search_volume" },
            { "data": "position" },
            { "data": "best_keyword" },
            { "data": "best_valume" },
            { "data": "best_position" },
            { "data": "impressions" },
            { "data": "session" },
            { "data": "goal_completion" },
            { "data": "conversion_rate" },
            { "data": "goal_conversion_rate" },
            { "data": "change_session" },
            { "data": "bounce_rate" },
            { "data": "avg_time_page" },
            { "data": "losing_trafic" },
            { "data": "link_count" },
            { "data": "ctr" },
            { "data": "content" },
            { "data": "title_1" },
            { "data": "meta_description_1" },
            { "data": "h1_1" },
            { "data": "word_count" },
            { "data": "canonical_link_element_1" },
            { "data": "status_code" },
            { "data": "indexability" },
            { "data": "last_modified" },
            { "data": "inlinks" },
            { "data": "outlinks" },
          ]
        });
        return true;
      }
      if(path[3] == 'ahrefs') {
        var table = $('#dataTable').DataTable({
          scrollY:'430px',
          scrollX: true,
          scrollCollapse: true,
          autoWidth: false,
          "ajax": url,
          "pageLength": 50,
          "ordering": false,
          "columns": [
            { "data": "ahref_number" },
            { "data": "domain_rating" },
            { "data": "url_rating_desc"},
            { "data": "referring_domains" },
            { "data": "referring_page_url" },
            { "data": "referring_page_title" },
            { "data": "internal_links_count" },
            { "data": "external_links_count" },
            { "data": "link_url" },
            { "data": "textpre" },
            { "data": "link_anchor" },
            { "data": "textpost" },
            { "data": "type" },
            { "data": "backlink_status" },
            { "data": "first_seen" },
            { "data": "last_check" },
            { "data": "day_lost" },
            { "data": "language" },
            { "data": "traffic" },
            { "data": "keywords" },
            { "data": "js_rendered" },
            { "data": "linked_domains" },
          ]
        });
        return true;
      }
        setDataTable(url, dataTable ,scrollx,height, path[3])
      }
    }

  function setDataTable(url, dataTable, scrollx = true, scrollY, tableType)
  {
    $.ajax({
      url: url,
      dataType: 'json',
      beforeSend: function() {
        html = "";
        html += `<div class="text-center"><div class="spinner-border text-info"  role="status">`;
        html += `<span class="sr-only">Loading...</span>`;
        html +=`</div></div>`;
        $('#myTable').html(html);
      },
      success: function(data) {
        $('#myTable').html(data.html);
        var table = $(dataTable).DataTable( {
          scrollY:        scrollY,
          scrollX:        scrollx,
          scrollCollapse: true,
          autoWidth: false,
          "pageLength": 50,
          // fixedColumns:   {
          //       leftColumns: 3
          //   }
        });
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
