var app = function() {

    $(function() {
        navToggleRight();
        navToggleLeft();
        navToggleSub();
        profileToggle();


    });

    var navToggleRight = function() {
        $('#toggle-right').on('click', function() {
            $('#sidebar-right').toggleClass('sidebar-right-open');
            $("#toggle-right .fa").toggleClass("fa-indent fa-dedent");

        });
    };

    var navToggleLeft = function() {
        $('#toggle-left').on('click', function() {
            var bodyEl = $('#main-wrapper');
            ($(window).width() > 767) ? $(bodyEl).toggleClass('sidebar-mini'): $(bodyEl).toggleClass('sidebar-opened');
        });
    };

    var navToggleSub = function() {
        var subMenu = $('.sidebar .nav');
        $(subMenu).navgoco({
            caretHtml: false,
            accordion: true
        });

    };

    var profileToggle = function() {
        $('#toggle-profile').click(function() {
            $('.sidebar-profile').slideToggle();
        });
    };

    //return functions
    return {

    };
}();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

Messenger.options = {
    extraClasses: 'messenger-fixed messenger-on-top messenger-on-right',
    theme: 'flat'
}

function showSuccess(msg){
    Messenger().post({
        message: msg,
        type: 'success',
        showCloseButton: true
    });
}

function showError(msg){
    Messenger().post({
        message: msg,
        type: 'error',
        showCloseButton: false
    });
}  

// bootstrap keep selected tab
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    // save only tabs by locale (#hr, #en..)
    if($(this).attr('href').length == 3)
    // save the latest tab; use cookies if you like 'em better:
localStorage.setItem('lastTab', $(this).attr('href'));
});

// go to the latest tab, if it exists:
var lastTab = localStorage.getItem('lastTab');
if (lastTab) {
    $('[href="' + lastTab + '"]').tab('show');
} else {
    $('a[data-toggle="tab"]:first').tab('show');    
}

$('input.icheck').iCheck({
    checkboxClass: 'icheckbox_flat-grey',
    radioClass: 'iradio_flat-grey'
});

// class active for current menu item
$('.sidebar-left li').each(function(){
    if(window.location == $('a', this).attr('href')){
        $(this).addClass('active');
    }
});

$('#image-holder').css({
    'height': $('#image-holder').width() * 0.67 + 'px'
});

$('.fileupload').fileupload({
    dataType: 'html',
    done: function (e, data) {
        $(data.result).appendTo($(this).closest('div').find('.sortable'));
        showSuccess('Spremljeno!');
        $('#progress .progress-bar').css('width', '0%');
    },
    error: function (data) {
        var errors = $.parseJSON(data.responseText);
        $.each(errors, function(index, value) {
            showError(value);
        });
        $('#progress .progress-bar').css('width', '0%');
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
            );
    }
});

// Ajax delete
$(document).on('click', 'a[delete]', function(e){ 
    e.preventDefault();
    $t = $(this);
    swal({   
        title: "Jeste li sigurni?",   
        text: "Podaci će biti nepovratno obrisani!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Da, obriši!",
        cancelButtonText: "Odustani!"
    }, 
    function(){         
        $.ajax({
            'url': $t.attr('href'),
            'type': 'DELETE',
            'data': '',
            'success': function(data) {
                $t.parent().parent().remove();
                showSuccess('Obrisano!');
            },
            'error': function(){
                showError('Došlo je do pogreške!');
            }
        });
    });
});

$("#fileUpload").on('change', function () {

    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#image-holder");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {

            image_holder.css({ 
                'background-image': 'url("' + e.target.result + '")', 
                'background-size': '100% 100%',
            });

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        showError('This browser does not support FileReader.');
    }
});


/**
* @param {*} requestData
*/
var changePosition = function(requestData){

    $.ajax({
        'url': '/sort',
        'type': 'POST',
        'data': requestData,
        'success': function(data) {
            if (data.success) {
                showSuccess('Spremljeno!');
            } else {
                showValidation(data.errors);
            }
        },
        'error': function(){
            showError('Došlo je do pogreške!');
        }
    });
};

// jQuery Sortable
$('.sortable').sortable({
    update: function(a, b){

        var entityName = $(this).data('entityname');
        var $sorted = b.item;

        var $previous = $sorted.prev();
        var $next = $sorted.next();

        if ($previous.length > 0) {
            changePosition({
                parentId: $sorted.data('parentid'),
                type: 'moveAfter',
                entityName: entityName,
                id: $sorted.data('itemid'),
                positionEntityId: $previous.data('itemid')
            });
        } else if ($next.length > 0) {
            changePosition({
                parentId: $sorted.data('parentid'),
                type: 'moveBefore',
                entityName: entityName,
                id: $sorted.data('itemid'),
                positionEntityId: $next.data('itemid')
            });
        } else {
            showError('Došlo je do pogreške!');
        }
    },
    cursor: "move"
});

// Global Datatables settings
$.extend( true, $.fn.dataTable.defaults, {
    serverSide: true,
    processing: true,
    dom: "<'row'<'col-md-6'<'#create'>><'col-md-6'f>><'row'<'col-md-12'tr>><'row'<'col-md-4'l><'col-md-4'i><'col-md-4'p>>",
    language: {
        lengthMenu: '_MENU_',
        search: '<div class="input-group">_INPUT_<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span></div>',
        searchPlaceholder: 'Pretraži..',
        info: 'Prikazano _START_ do _END_ od _TOTAL_ rezultata',
        infoEmpty: 'Prikazano 0 do 0 od 0 rezultata',
        infoFiltered:'(filtrirano iz _MAX_ ukupnih rezultata)',
        emptyTable: 'Ništa nije pronađeno',
        zeroRecords: 'Ništa nije pronađeno',
        paginate: {
            first: 'Prva',
            previous: 'Nazad',
            next: 'Naprijed',
            last: 'Zadnja'
        }
    }
});

$.fn.dataTable.moment('DD.MM.YYYY.');

$('.datepicker').datepicker({
    weekStart: 1,
    format: 'dd.mm.yyyy.',
    autoclose: true
});

$('.textarea').wysihtml5();