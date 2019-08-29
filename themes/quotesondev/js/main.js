jQuery(($) => {
    const $quote_btn = $('#quote-button'),
          $content = $('.entry-content'),
          $title = $('.entry-meta'),
          $submit = $('.submit-button');
    
    window.addEventListener('popstate', function() {
        window.location=window.location;
    });

    $quote_btn.on('click', function(event) {
        event.preventDefault();
        $.ajax({
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

    $submit.on('click', function(event) {
        event.preventDefault();

        let $author= $('.author').val(),
            $quote= $('.content').val(),
            $source= $('.source').val(),
            $url= $('.url').val();

        if ($author === '') {
            alert('Please provide the author of the quote.');
            $('.author').focus();
            
        } else if ($quote === '') {
            alert('Please provide the quote.');
            $('.content').focus();
         
        } else if ($source === '') {
            alert('Please provide the source of the quote.');
            $('.source').focus();
            
        } else {
            $.ajax({
                method: 'POST',
                url: qod_vars.rest_url + 'wp/v2/posts/',
                data: {
                    title : $author,
                    content : $quote,
                    quote_source : $source,
                    quote_url : $url,
                    post_status : 'pending'
                },

                beforesend: function(xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
                }
            }).done(function() {
                alert('Thank you for submitting your quote!');
                $('.submit-form')[0].reset();
            }).fail(function() {
                alert('Please try again.');
                $('.submit-form')[0].reset();
            });
        }
    });
});