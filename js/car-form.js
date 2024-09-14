jQuery(document).ready(function($) {
    $('#car-form').on('submit', function(e) {
        e.preventDefault();


        var carName = $('#car_name').val(); // Make sure this is the correct ID
        var make = $('#make').val();
        var model = $('#model').val();
        var fuelTypes = $('input[name="fuel_type[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        var formData = new FormData(this); // Create FormData object with all form data
        formData.append('action', 'submit_car_form');
        formData.append('car_name', carName);
        formData.append('make', make);
        formData.append('model', model);
        formData.append('fuel_types', JSON.stringify(fuelTypes))

        $.ajax({
            type: 'POST',
            url: carForm.ajaxurl,
            data: formData,
            contentType: false, // Set contentType to false for file uploads
            processData: false,

            success: function(response) {
                if (response.success) {
                    alert('Car has been added successfully!');
                    $('#car-form')[0].reset(); // Reset form after submission
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function() {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
