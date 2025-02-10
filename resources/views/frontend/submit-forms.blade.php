<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Both Forms</title>
    <!-- Include jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <form id="form1" action="{{ route('handleBothForms') }}" method="post">
        <!-- Form 1 fields go here -->
        @csrf
        <label for="input1">Form 1 Input:</label>
        <input type="text" id="input1" name="input1" required>
    </form>

    <form id="form2" action="{{ route('handleBothForms') }}" method="post">
        <!-- Form 2 fields go here -->
        @csrf
        <label for="input2">Form 2 Input:</label>
        <input type="text" id="input2" name="input2" required>
    </form>

    <button id="submitBtn">Submit Both Forms</button>

    <script>
        $(document).ready(function () {
            $('#submitBtn').on('click', function () {
                // Collect data from both forms
                var formData1 = $('#form1').serializeArray();
                var formData2 = $('#form2').serializeArray();

                // Combine data from both forms
                var combinedData = formData1.concat(formData2);

                // Send combined data as an AJAX request
                $.ajax({
                    type: 'POST',
                    url: '{{ route("handleBothForms") }}',
                    data: combinedData,
                    success: function (response) {
                        // Handle the response if needed
                        console.log(response);
                    },
                    error: function (error) {
                        // Handle errors if needed
                        console.error(error);
                    }
                });
            });
        });
    </script>

</body>

</html>
