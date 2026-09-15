(function( $ ){

  function normalizeUrl(url) {
    if (!url) return '';
    url = url.trim();
    var currentOrigin = window.location.origin;
    // Replace any foreign domain (hostinger or localhost) pointing to storage with current local origin
    if (url.indexOf('/storage/') !== -1) {
      var path = url.substring(url.indexOf('/storage/'));
      return currentOrigin + path;
    }
    return url;
  }

  function renderPreviews(target_input, target_preview) {
    target_preview.html('');
    var raw = target_input.val() ? target_input.val().trim() : '';
    if (!raw) return;
    
    var urls = raw.split(',').map(function(u) { return normalizeUrl(u); }).filter(function(u) { return u !== ''; });
    
    // Update input with normalized URLs
    if (urls.join(',') !== raw) {
      target_input.val(urls.join(','));
    }

    urls.forEach(function(url, idx) {
      var wrapper = $('<div class="img-preview-wrapper"></div>').css({
        'position': 'relative',
        'display': 'inline-block',
        'margin-right': '15px',
        'margin-bottom': '15px',
        'vertical-align': 'top'
      });
      
      var img = $('<img>').css({
        'height': '5.5rem',
        'width': '5.5rem',
        'object-fit': 'cover',
        'border-radius': '6px',
        'border': '1px solid #dcdcdc',
        'box-shadow': '0 2px 5px rgba(0,0,0,0.1)'
      }).attr('src', url);
      
      var delBtn = $('<button type="button" title="Remove image">&times;</button>').css({
        'position': 'absolute',
        'top': '-8px',
        'right': '-8px',
        'background': '#e74c3c',
        'color': '#ffffff',
        'border': '2px solid #ffffff',
        'border-radius': '50%',
        'width': '22px',
        'height': '22px',
        'font-size': '15px',
        'line-height': '17px',
        'text-align': 'center',
        'cursor': 'pointer',
        'font-weight': 'bold',
        'box-shadow': '0 2px 4px rgba(0,0,0,0.3)',
        'padding': '0'
      });
      
      delBtn.on('click', function(e) {
        e.preventDefault();
        urls.splice(idx, 1);
        var updatedPath = urls.join(',');
        target_input.val(updatedPath);
        renderPreviews(target_input, target_preview);
      });
      
      wrapper.append(img).append(delBtn);
      target_preview.append(wrapper);
    });
  }

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    this.each(function() {
      var btn = $(this);
      var target_input = $('#' + btn.data('input'));
      var target_preview = $('#' + btn.data('preview'));

      // Render initial preview if input has value on page load
      renderPreviews(target_input, target_preview);

      // Listen for manual input changes
      target_input.on('change input', function() {
        renderPreviews(target_input, target_preview);
      });

      btn.on('click', function(e) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        window.open(route_prefix + '?type=' + type + '&multiple=true', 'FileManager', 'width=900,height=600');
        
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return normalizeUrl(item.url);
          }).join(',');

          // Append to existing input value if present, preventing duplicate items
          var existing = target_input.val() ? target_input.val().trim() : '';
          var full_path = file_path;
          if (existing !== '') {
            var existing_arr = existing.split(',').map(function(u) { return normalizeUrl(u); }).filter(function(u) { return u !== ''; });
            items.forEach(function(item) {
              var normUrl = normalizeUrl(item.url);
              if (existing_arr.indexOf(normUrl) === -1) {
                existing_arr.push(normUrl);
              }
            });
            full_path = existing_arr.join(',');
          }

          target_input.val(full_path);
          renderPreviews(target_input, target_preview);
        };
        return false;
      });
    });
  };

})(jQuery);
