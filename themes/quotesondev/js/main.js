jQuery(($) => {
    const $quote_btn = $('#quote-button'),
          $content = $('.entry-content'),
          $title = $('.entry-meta');
    
    window.addEventListener('popstate', function() {
        window.location=window.location;
    });

    $quote_btn.on('click', function(event) {
        event.preventDefault();
        jQuery.ajax({
            method: 'GET',
            url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
            beforesend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
            }
        })
        .done(function(answer) {
            history.pushState('', '', answer[0].link);
                $content.empty().append(
                    `<p>${answer[0].content.rendered}</p>`);
                $title.empty().append(
                    `<h2 class="entry-title">&#8212 ${answer[0].title.rendered}</h2>
                    <span class="source">
                        <a href="${answer._qod_quote_source_url}">
                        ${answer._qod_quote_source}</a>
                    </span>`);      
        });
    });
});