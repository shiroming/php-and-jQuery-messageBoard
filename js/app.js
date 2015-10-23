(function($) {
    var _name = $('#name');
    var _message = $('#message');
    var messages;
    var html = '';
    var template = $.trim($('#messageTemplate').html());

    $.ajax({
        url: 'api/messages.php',
        type: 'get',
        data: {'token': $('#token').val()},
        dataType: 'json',
        success: function(data) {
            messages = data;

            $.each(messages, function(index, obj) {
                html += template.replace(/{{ name }}/ig, obj.name)
                                .replace(/{{ message }}/ig, obj.message);
            });

            $('.messages').append(html);
        }
    });

    $('form').on('submit', function(e) {
        e.preventDefault();

        if (_name.val() === '' || _message.val() === '') return;

        $.ajax({
            url: $('form').attr('action'),
            type: 'post',
            data: $('form').serializeArray(),
            dataType: 'json',
            success: function(data) {
                insertMessage(data);

                clearInput();
            },
            error: function(data) {
                console.log('error: ' + data);
            }
        });
    });

    function insertMessage (data) {
        var message = $('<div></div>');
        var p = $('<p></p>');
        var b = $('<b></b>');
        message.addClass('message');
        p.html(data.message);
        b.html(data.name + ': ');

        b.prependTo(p);
        p.appendTo(message);
        message.prependTo($('.messages'));
    }

    function clearInput () {
        _name.val('');
        _message.val('');
    }
})(jQuery);