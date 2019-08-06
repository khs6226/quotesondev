jQuery(() => {
    window.addEventListener('popstate', function() {
        window.location=window.location;
    });

    jQuery('#quote-button').on('click', function(event) {
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
            for(let i=0; i<answer.length; i++) {
                jQuery('.entry-content').empty().append(
                    `<p>${answer[i].content.rendered}</p>`);
                jQuery('.entry-meta').empty().append(
                    `<h2 class="entry-title">&#8212 ${answer[i].title.rendered}</h2>
                    <span class="source">
                        <a href="${answer[i]._qod_quote_source_url}">
                        ${answer[i]._qod_quote_source}</a>
                    </span>`);
                }
        });
    });
});