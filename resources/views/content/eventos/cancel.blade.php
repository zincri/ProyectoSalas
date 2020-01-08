<div class="message-box message-box-danger animated fadeIn" id="message-box-cancel-{{$item->id}}">
    {{Form::Open(array('url'=>['eventos/cancel/'.$item->id],'method'=>'POST'))}}
    {{!! Form::token() !!}}
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-times"></span> Cancelar Evento</div>
                        <div class="mb-content">
                            <p>¿Esta seguro que desea cancelar este Evento?</p>
                        </div>
                        <div class="mb-footer">
                            
                        <button class="btn btn-primary btn-lg pull-right" type="submit">Cancelar evento</button>
                            &nbsp; 
                        <button class="btn btn-default btn-lg pull-right" type="button" data-dismiss="modal">Cancelar operación</button>
                        </div>
                    </div>
                </div>
    {{Form::Close()}}
</div>