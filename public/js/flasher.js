
    //notif
    // Create an instance of Notyf
    var notyf = new Notyf({
        duration: 5000,
        ripple: true,
        position: {
            x: 'center',
            y: 'top',
        },
        dismissible: true,
        types: [{
            type: 'warning',
            background: 'orange',
            icon: '<i class="fa-solid fa-circle-exclamation"></i>',
        },
        {
            type: 'info',
            background: 'dodgerblue',
            icon: '<i class="fa-solid fa-circle-info"></i>',
        },


        ]
    });

    // show  notification
    $(".notyf").each(function () {
        message = $(this).attr("data");
        type = $(this).attr("type");

        if (message && type) {
            notyf.open({
                type: type,
                message: message
            })
        }
    })
