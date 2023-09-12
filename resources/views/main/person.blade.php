@extends('layouts.app')
@section('title', 'Hubungi Kami')
@section('main')
<section class="p-5 bg-dark text-light">
    <div class="container">
        <form action="#" method="post">
            <div class="row justify-content-center">
                <div class="col-md-6 p-5">
                    <div class="h1 mb-3 text-center">
                        <i class="bi bi-laptop"></i>
                      </div>
                    <h2 class="text-center">Layanan Masyarakat</h2>
                    <div class="card">
                        <div class="card-body text-dark">
                            <form action="" method="post">
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <h5>Nama Lengkap</h5>
                                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col mb-3">
                                        <h5>Nomber Whatsapp</h5>
                                        <input type="number" class="form-control form-control-lg" id="nohp" placeholder="+62">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-mb-6 mb-3">
                                        <h5>Prihal</h5>
                                        <input type="text" class="form-control form-control-lg" id="prihal" placeholder="Prihal Pertanyaan">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5>Keluhan</h5>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Jelaskan Lebih Detail"></textarea>
                                </div>
                                <button type="button" class="btn btn-dark btn-lg" onclick="sendMessage()">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    function sendMessage() {
        var name = document.getElementById('name').value;
        var nohp = document.getElementById('nohp').value;
        var prihal = document.getElementById('prihal').value;
        var message = document.getElementById('message').value;
        

        // Format the message with line breaks for WhatsApp
        var formattedMessage = encodeURIComponent("Name: " + name + "\nNomber Phone: "+ nohp + "\nPrihal: " + message + "\nMessage: " + message);

        // Construct the WhatsApp URL
        var whatsappURL = "https://wa.me/6285559322548?text=" + formattedMessage;

        // Replace PHONE_NUMBER with your phone number (including country code)
        // Example: var whatsappURL = "https://wa.me/1234567890?text=" + formattedMessage;

        // Open WhatsApp in a new tab/window
        window.open(whatsappURL, '_blank');
    }
</script>
@endsection
