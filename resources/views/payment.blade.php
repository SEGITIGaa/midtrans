<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lw6XCrLwtvHqoGKG"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center h-screen w-full">
        <button id="pay-button" class="bg-cyan-500 rounded-lg py-3 px-5 text-slate-50">Pay!</button>
    </div>

    <form action="" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>

    <script type="text/javascript">

        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snap_token}}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                    kirirm_respon_ke_form(result)
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    kirirm_respon_ke_form(result)
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    kirirm_respon_ke_form(result)
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
        function kirirm_respon_ke_form(result) { 
            // document.getElementById('json_callback').value = JSON.stringify(result)
            // $('#submit_form').submit()
         }
    </script>
</body>

</html>