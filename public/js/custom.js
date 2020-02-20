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
      var ordering = true;
      var scrollx = true;
      var height  ="470px";
      if(path[3] == 'sitemap') {
        columns = [
          { "data": "name"},
          { "data": "url" },
        ];
      }
      if(path[3] == 'aggregation') {
        height = "430px";
        ordering = false;
        columns =  [
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
        ];
      }
      if(path[3] == 'screaming-frogs') {
        columns = [
          { "data": "address" },
          { "data": "content" },
          { "data": "status_code"},
          { "data": "status" },
          { "data": "indexability" },
          { "data": "indexability_status" },
          { "data": "title_1" },
          { "data": "title_1_length" },
          { "data": "title_1_pixel_width" },
          { "data": "meta_description_1" },
          { "data": "meta_description_1_length" },
          { "data": "meta_description_1_pixel_width" },
          { "data": "meta_keyword_1" },
          { "data": "meta_keywords_1_length" },
          { "data": "h1_1" },
          { "data": "h1_1_length" },
          { "data": "h1_2" },
          { "data": "h1_2_length" },
          { "data": "h2_1" },
          { "data": "h2_1_length" },
          { "data": "h2_2" },
          { "data": "h2_2_length" },
          { "data": "meta_robots_1" },
          { "data": "x_robots_tag_1" },
          { "data": "meta_refresh_1" },
          { "data": "canonical_link_element_1" },
          { "data": "relnext_1" },
          { "data": "relprev_1" },
          { "data": "http_relnext_1" },
          { "data": "http_relprev_1" },
          { "data": "size_bytes" },
          { "data": "word_count" },
          { "data": "text_ratio" },
          { "data": "crawl_depth" },
          { "data": "link_score" },
          { "data": "inlinks" },
          { "data": "unique_inlinks" },
          { "data": "percentage_of_total" },
          { "data": "outlinks" },
          { "data": "unique_outlinks" },
          { "data": "external_outlinks" },
          { "data": "unique_external_outlinks" },
          { "data": "hash" },
          { "data": "response_time" },
          { "data": "last_modified" },
          { "data": "redirect_url" },
          { "data": "redirect_type" },
          { "data": "url_encoded_address" },
        ];
      }
      if(path[3] == 'ahrefs') {
        columns = [
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
        ];
      }
      if(path[3] == 'sem-rush') {
        columns =  [
          { "data": "url" },
          { "data": "keyword" },
          { "data": "position"},
          { "data": "previous_position" },
          { "data": "search_volume" },
          { "data": "keyword_difficulty" },
          { "data": "cpc" },
          { "data": "traffic" },
          { "data": "traffic_percentage" },
          { "data": "traffic_cost" },
          { "data": "competition" },
          { "data": "number_of_results" },
          { "data": "trends" },
          { "data": "timestamp" },
          { "data": "serp_features_by_keyword" },
        ];
      }
      if(path[3] == 'google-search-console') {
        columns = [
          { "data": "page" },
          { "data": "impressions" },
          { "data": "clicks"},
          { "data": "ctr" },
          { "data": "position" },
        ];
      }
      setDataTable(url, dataTable, height, columns, scrollx, ordering)
    }
  }

  function setDataTable(url, dataTable, scrollY, columns, scrollx, ordering = true)
  {
    var table = $(dataTable).DataTable({
      scrollY:scrollY,
      scrollX: scrollx,
      scrollCollapse: true,
      autoWidth: false,
      ordering: ordering,
      "ajax": url,
      "pageLength": 50,
      "columns": columns
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
