$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#flash-overlay-modal').modal();

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

// override jquery validate plugin defaults
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

// fancy file selection
var SITE = SITE || {};
SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.show-button'),
      $fakeFile = $this.siblings('.file-holder');
    if(newVal !== '') {
        $button.text('Photo Chosen');
        // if($fakeFile.length === 0) {
        //     $button.after('<span class="file-holder">' + newVal + '</span>');
        // } else {
        //     $fakeFile.text(newVal);
        // }
    }
};

$(function() {
    $('.summernote').summernote({
        height: 250,
        codemirror: {
            theme: 'monokai'
        }
    });

    $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
    });

    $('input').icheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.show-tooltip').tooltip();

    $("form[data-confirm]").submit(function(e) {
        e.preventDefault();
        
        var currentForm = this;
        bootbox.confirm($(this).attr("data-confirm"), function(result) {
            if(result)
            {
                currentForm.submit();
            }
        });
        
    });

    $("a[data-delete]").click(function(e) {
        e.preventDefault();
        
        var currentLink = $(this);
        bootbox.confirm(currentLink.attr("data-delete"), function(result) {
            if(result) {
                location = currentLink.attr("data-url");
            }
        });
    });

});