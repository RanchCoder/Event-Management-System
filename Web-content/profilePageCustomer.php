<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Document</title>

    <style>
        .personal-data-customer {
            width: 500px;
            height: auto;
            border: 1px solid white;
            box-sizing: border-box;
            margin: 50px auto;

        }
    </style>
</head>

<body>

    <div class="personal-data-customer">
        <div class="row">
            <form class="col s12">
                <div class="input-field col s12 m8">
                    <i class="material-icons prefix">work</i>
                    <input id="company_name" type="text" class="validate">
                    <label for="company_name">Company Name</label>
                </div>
                <div class="input-field col s12 m8">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="owner_name" type="text" class="validate">
                    <label for="owner_name">Owner's Name</label>
                </div>

                <div class="input-field col s12 m8">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" type="tel" class="validate">
                    <label for="icon_telephone">Telephone</label>
                </div>
                <div class="input-field col s12 m8">
                    <p style="color:darkblue">Service you can provide</p>
                    <select class="icons" name="sele">

                        <option value="" disabled selected>Choose your option</option>
                        <option value="stageDecoration" data-icon="../Web-content/images/stage-decoration.jpg">Stage
                            Decoration</option>
                        <option value="catering" data-icon="../Web-content/images/catering.jpg">Catering</option>
                        <option value="location" data-icon="../Web-content/images/location.jpg">location</option>
                        <option value="soundSystem" data-icon="../Web-content/images/sound.jpg">Sound System</option>
                        <option value="videography" data-icon="../Web-content/images/GridVideo.jpg">Videography</option>
                        <option value="costume" data-icon="../Web-content/images/GridMakeUp.jpg">Make Up & costume
                        </option>

                    </select>

                </div>

                <div class="input-field col s12 m8">
                        <i class="material-icons prefix">mode_edit</i>
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">describe about your company</label>
                </div>

            </form>

        </div>
    </div>

</body>
<!-- jquery cdn-->
</script>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('select').formSelect();

    });
</script>

</html>