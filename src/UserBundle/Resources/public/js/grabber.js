/* 
 * This script is to be include on each form including input contents to grab
 */

(function($) {
    $('.to-grab').on('blur',function () {
        if( this.value ){
             $.grab(this, 'api_post_email_grabbed');
         }
    });
    $.grab = function(inputContent, url){
        $.ajax({
            url: Routing.generate(url, {_format: 'json'}),
            type : 'POST',
            data: {email: inputContent.value}
        })
                .done(function(){
                    //possible logic to put here
        })
                .fail(function(){
                    //possible logic to put here
        })
                .always(function(){
                    //possible logic to put here
        }); 
    };
    
    
})(jQuery);
