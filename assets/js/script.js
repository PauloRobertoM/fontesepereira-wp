$(document).ready(function(){
    $('.slider').slider({
        height:500
    });

    $('.modal').modal();

    $(".button-collapse").sideNav();

    $('.owl-capa').owlCarousel({
        autoplay:true,
        loop:false,
        margin:0,
        nav:false,
        items:1
    });

    $('.owl-interna').owlCarousel({
        loop: false,
        autoplay: true,
        margin: 30,
        nav: false,
        // navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});

;(function($, window) {
    $("#_form_contato").on("submit", function( event ) {
        event.preventDefault();
    });

    function createAlert(type, text) {
        var $html = '<div class="alert alert-'+type+' alert-dismissible fade in" role="alert">';
            $html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $html += text;
            $html += '</div>';
        return $html;
    }

    $("#_form_contato").on("submit", function( event ) {
        event.preventDefault();

        var $callbacks = $("#_contato_callbacks");
        var formData = new FormData();

        formData.append("action", "contato");
        formData.append("nome", $("#contato_nome").val());
        formData.append("email", $("#contato_email").val());
        formData.append("assunto", $("#contato_assunto").val());
        formData.append("mensagem", $("#contato_mensagem").val());

        $.ajax({
            type: "post",
            url: ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $callbacks.find(".alert").remove();
            },
            success: function(res) {
                if ( res.erros ) {
                    $callbacks.prepend(createAlert('danger', res.erros[0]));
                } else {
                    // clearValues(["#contato_nome", "#contato_email", "#contato_assunto", "#contato_mensagem"]);
                    $callbacks.prepend(createAlert('success', 'Contato enviado com sucesso. Em breve entraremos em contato através dos dados informados no formulário.'));
                }
            },
            error: function(res) {
                $callbacks.prepend(createAlert('danger', 'ops, estamos com problemas em nosso servidor. tente de novo mais tarde.'));
            },
            complete: function(res) {
                console.log("complete");
                $("html, body").animate({ scrollTop: $("#_form_contato").offset().top-100 }, 600);
            }
        });
    });
})(jQuery, window);