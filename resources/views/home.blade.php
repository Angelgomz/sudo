@include ('layouts.main')
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
@include ('layouts.footer')