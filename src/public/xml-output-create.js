var sendXml = function () {
    this.initialiseEvents = function () {
        $('#send-xml-output').bind('click', $.proxy(this.sendXmlOutput, this));
    };

    this.sendXmlOutput = function () {
        $.ajax({
            method: "POST",
            url: URL + '/create',
            dataType: "json",
            data: {
                title: title,
                description: description,
                launchUrl: launchUrl,
                iconUrl: iconUrl
            },
            beforeSend: function() {
                $('#output').attr('hidden', false).html('Creating entry ...');
                $("#send-xml-output").prop('disabled', true);
            },
            success: function (data) {
                $('#output').attr('hidden', false).html(data.success).addClass('alert-success').delay(6000).fadeOut(700);
                $("#send-xml-output").prop('disabled', false);
            },
            error: function (data) {
                $('#output').attr('hidden', false).html(data.error).addClass('alert-danger').delay(7000).fadeOut(700);
            }
        });
    };
    this.initialiseEvents();
};

$(document).ready(function () {
    new sendXml();
});