<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css"/>
</head>
<body>
        <div class="modal" id="modalEvent" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Evento:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form>
                                    <div class="form-group pt-1 pb-1">
                                        <label for="name">Nombre del evento: </label>
                                        <input type="email" class="form-control" id="name"  placeholder="Meeting with sudo team">
                                    </div>
                                    <div class="form-group pt-1 pb-1">
                                        <label for="date">Fecha del evento: </label>
                                        <input class="form-control" id="fecha" name="fecha" placeholder="28/03/22 " type="text">                                                                    
                                    </div>
                                    <div class="form-group d-flex pt-1 pb-1">
                                        <label for="date">Hora: </label>
                                        <input class="form-control" id="begin" name="fecha" placeholder="11:30"     type="text">    
                                        <input class="form-control" id="end" name="fecha" placeholder="12:30" type="text">   
                                    </div>

                                    <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                     
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
        </div>         
        <nav class="nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
        </nav>
        <div class="container">
             <div class="row">
                 <div class="col-2 pt-2 pb-2">
                        <button type="button" class="btn btn-light" id="createEvent">Crear nuevo evento</button>
                </div>
            </div>
            <div class="row">
                    <iframe src="https://calendar.google.com/calendar/embed?src=64nul8cver2kr5av1o37n3gb98%40group.calendar.google.com&ctz=America%2FCaracas" style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
                  </iframe>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script src="../public/js/funciones.js"></script>
</html>