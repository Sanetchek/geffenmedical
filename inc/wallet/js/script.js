( function( $ ) {
    $(document).ready(function() {
        let $pkPassEmailBox = $('#geffen_pkpass_email'),
            $button = $pkPassEmailBox.find('button');

        function send(event) {
            event.preventDefault();

            const data = {
                'id': $('#pass_post_id').val(),
                'action': 'geffen_pkpass_send',
                'email': $('#geffen_pkpass_email_input').val(),
            };

            $.ajax(ajaxurl, {
                beforeSend: () => {
                    $button.prop('disabled', 'disabled')
                        .addClass('disabled');
                },
                complete: () => {
                    $button.prop('disabled', false)
                        .removeClass('disabled');
                },
                data,
                dataType: 'json',
                success: response => {
                    console.log(response);

                    if(!response.success) {
                        alert(response.data.message);
                        return;
                    }
                    alert('Sent!');
                },
                error: error => {
                    console.log(error);
                    alert('Error');
                }


            });
            console.log(data);
        }


        $button.on('click', send);
    });

}( jQuery ) );